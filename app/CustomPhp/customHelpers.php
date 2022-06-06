<?php

// use ZipArchive;
// use RecursiveIteratorIterator;
use Illuminate\Support\Facades\File;

/************************** EXCEL FILES GENERATION EXTRA FUNCTIONS **********/
//flattens an array
function flatten(array $array): array
{
    $return = array();
    array_walk_recursive($array, function ($a) use (&$return) {
        $return[] = $a;
    });
    return $return;
}
//Sort an Array by keys based on another Array?
function SortAccordingToAList($array = [], $listOfKeys = []): array
{
    $sorted = [];
    for ($j = 0; $j < count($array); $j++) {
        for ($i = 0; $i < count($listOfKeys); $i++) {
            $value = (array) $array[$j];
            if (in_array($listOfKeys[$i], array_keys($value))) {
                $sorted[$j][$listOfKeys[$i]] = $value[$listOfKeys[$i]];
            }
        }
    }
    return $sorted;
}
//gets alphabetical chars in a array
function Alphabet(): array
{
    $alphabet = range('A', 'Z');
    //adds more strings to the alphabets like AA, AB, AC, ...
    foreach (range('A', 'Z') as $char) {
        array_push($alphabet, 'A' . $char);
    }
    return $alphabet;
}

//function to return the ordinal number from a cardinal one
function ordinal($number): string
{
    $ends = array('th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th');
    if ((($number % 100) >= 11) && (($number % 100) <= 13))
        return $number . 'th';
    else
        return $number . $ends[$number % 10];
}
/************************** PDF FILES GENERATION EXTRA FUNCTIONS **********/
//get date in fr format
function getDate_Fr(): string
{
    //date
    setlocale(LC_TIME, 'fr_FR.utf8');
    $date = strftime("%d %m %Y");

    //creates an array of each part of the date
    $date = explode(' ', $date);
    $months = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
    //refromats the date in to french format
    $date = $date[0] . " " . $months[$date[1] - 1] . " " . $date[2];

    return $date;
}

//add extra fonts
function addFonts(): array
{
    $arial_rounded_b = app_path('CustomPhp/PdfPhp/fonts/arial_rounded_bold.ttf');
    $ariale = app_path('CustomPhp/PdfPhp/fonts/Arial.ttf');
    $arial_N = app_path('CustomPhp/PdfPhp/fonts/ArialN.ttf');
    $arial_NB = app_path('CustomPhp/PdfPhp/fonts/ArialNB.ttf');
    $helvetica_n = app_path('CustomPhp/PdfPhp/fonts/helvetica_neue.ttf');
    $helvetica_neue_b = app_path('CustomPhp/PdfPhp/fonts/helvetica_neue_bold.ttf');
    //adds rounded arial
    $arial_rounded_bold = TCPDF_FONTS::addTTFfont($arial_rounded_b, 'TrueTypeUnicode', '', 96);
    //adds arial font
    $arial = TCPDF_FONTS::addTTFfont($ariale, 'TrueTypeUnicode', '', 96);
    $arial_narrow = TCPDF_FONTS::addTTFfont($arial_N, 'TrueTypeUnicode', '', 96);
    $arial_bold = TCPDF_FONTS::addTTFfont($arial_NB, 'TrueTypeUnicode', '', 96);
    //helvetica neue
    $helvetica_neue = TCPDF_FONTS::addTTFfont($helvetica_n, 'TrueTypeUnicode', '', 96);
    // $helvetica_neue_bold = TCPDF_FONTS::addTTFfont($helvetica_neue_b, 'TrueTypeUnicode', '', 96);

    return [
        "arial_rounded_bold" => $arial_rounded_bold,
        "arial" => $arial, $arial_narrow,
        "arial_bold" => $arial_bold,
        "helvetica_neue" => $helvetica_neue,
        // "helvetica_neue_bold" => $helvetica_neue_bold
    ];
}

/************************************************* FUNCTIONS FOR MANAGING FOLDERS *******************************/
//function to create folders
function CreateDir(String $path): void
{
    $path = ReplacePathSeparator($path);
    if (!file_exists($path)) {
        File::makeDirectory($path, 0777, true);
    }
}

//creates a directory at the root of the project
function CreatDirAtRoot(String $path)
{
    CreateDir($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $path);
}

//function to delete a directory
function DeleteDir(String $path): void
{
    $path = ReplacePathSeparator($path);
    array_map('unlink', glob("$path/*.*"));
    rmdir($path);
}

//function to zip a file
function ZipDir(String $pathdir, String $zipCreated): void
{
    // Get real path for our folder
    $rootPath = realpath($pathdir);

    // Initialize archive object
    $zip = new ZipArchive();
    $zip->open($zipCreated, ZipArchive::CREATE | ZipArchive::OVERWRITE);

    // Create recursive directory iterator
    /** @var SplFileInfo[] $files */
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($rootPath),
        RecursiveIteratorIterator::LEAVES_ONLY
    );

    foreach ($files as $name => $file) {
        // Skip directories (they would be added automatically)
        if (!$file->isDir()) {
            // Get real and relative path for current file
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen($rootPath) + 1);

            // Add current file to archive
            $zip->addFile($filePath, $relativePath);
        }
    }

    // Zip archive will be created only after closing object
    $zip->close();
}

//function to replace / or \ by the server's default folder delimiter
function ReplacePathSeparator(String $path)
{
    return str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $path);
}

//function to download zip file
function DownloadZip($fileFullPath): void
{
    $fileFullPath = ReplacePathSeparator($fileFullPath);
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="' . basename($fileFullPath) . '"');
    header('Content-Length: ' . filesize($fileFullPath));
    readfile($fileFullPath);
}

/**
 * @param $callback String the function to use as callback. It must have only one parameter that is the directory name to create and put all documents in
 * @param $dir String the directory name where files will be kept in
 * @param $zipName String name of the zip file to create and to be downloaded
 * @return void
 */
function bulkWrite(String $callback, String $dir, String $zipName): void
{
    //gets the exact path to the project folder on the server
    $projectPath = explode('/', $_SERVER['REQUEST_URI'])[1];
    $projectPath = ReplacePathSeparator($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $projectPath);
    //adds the new folder to create in the path
    $dir = $projectPath . DIRECTORY_SEPARATOR . $dir;
    //adds the zip file to the path
    $zipName = $projectPath . DIRECTORY_SEPARATOR . $zipName;
    //creates the new directory
    CreateDir($dir);
    //calls the callback
    call_user_func($callback, $dir);
    //zip the directory
    ZipDir($dir, $zipName);
    //deletes the directory
    DeleteDir($dir);
    //makes the new zipped file downloadable
    DownloadZip($zipName);
    //deletes the zip file
    unlink($zipName);
}

//function to get the relative path
function GetRelativePath($from, $to): string
{
    // some compatibility fixes for Windows paths
    $from = is_dir($from) ? rtrim($from, '\/') . '/' : $from;
    $to   = is_dir($to)   ? rtrim($to, '\/') . '/'   : $to;
    $from = str_replace('\\', '/', $from);
    $to   = str_replace('\\', '/', $to);

    $from     = explode('/', $from);
    $to       = explode('/', $to);
    $relPath  = $to;

    foreach ($from as $depth => $dir) {
        // find first non-matching dir
        if ($dir === $to[$depth]) {
            // ignore this directory
            array_shift($relPath);
        } else {
            // get number of remaining dirs to $from
            $remaining = count($from) - $depth;
            if ($remaining > 1) {
                // add traversals up to first matching dir
                $padLength = (count($relPath) + $remaining - 1) * -1;
                $relPath = array_pad($relPath, $padLength, '..');
                break;
            } else {
                $relPath[0] = './' . $relPath[0];
            }
        }
    }
    return implode('/', $relPath);
}

function _define(String $constant, $value)
{
    if (!defined($constant)) return define($constant, $value);
}

function zipAndDownload($fileName)
{
    $filesPath = storage_path('excelFiles');
    $zip = new ZipArchive;
    if ($zip->open(storage_path($fileName), ZipArchive::CREATE) === TRUE) {
        $files = File::files($filesPath);
        foreach ($files as $key => $value) {
            $relativeInZipFile = basename($value);
            $zip->addFile($value, $relativeInZipFile);
        }
        $zip->close();
    }

    File::delete(File::allFiles($filesPath));
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="' . basename(storage_path($fileName)) . '"');
    header('Content-Length: ' . filesize(storage_path($fileName)));
    readfile(storage_path($fileName));
    unlink(storage_path($fileName));
}