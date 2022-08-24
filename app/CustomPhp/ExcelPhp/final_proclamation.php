<?php

require_once(app_path('CustomPhp/ExcelPhp/excel.php'));

// require("../functions.php");
require_once(app_path("CustomPhp/customHelpers.php"));


//name of the file executing the script's folder name
$executingScriptFolderName = dirname($_SERVER['SCRIPT_FILENAME']);
//name of the current folder
$currentFolderName = dirname(__FILE__);
_define("PHPSPREADSHEET_IMAGE_PATH_", GetRelativePath($executingScriptFolderName, $currentFolderName));

//starting column to write data
_define("STARTING_COL_FP", 1);
//starting column to write data
_define("LAST_COL_FP", 7);
//starting row for writing data
_define('STARTING_ROW_FP', 2);
//defines ordinal numbers from cardinal
_define("CARDINAL_NUMBERS_", ['L1' => "SECOND", 'L2' => "THIRD", 'L3' => "FOURTH", 'M1' => "FIFTH", 'M2' => "FIFTH"]);


function FinalProclamation($academicYear, $className, $domain, $yearNumber, $data, $saveInFolder = '')
{
    // dd($data);
    
    $download = empty($saveInFolder);
    $sheet = new ExcelXport();

    //gets alphabetical chars in an array
    global $alphabet;
    $alphabet = range('A', 'Z');
    //adds more strings to the alphabets like AA, AB, AC, ...
    foreach (range('A', 'Z') as $char) {
        $alphabet[] = 'A' . $char;
    }

    //returns the corresponding column by reducing automatically by 1 to the passed index
    $alph = function($index) use ($alphabet) {return $alphabet[$index - 1];};

    //creates a cell reference
    $ref = function($colIndex, $rowindex) use ($alph) {return $alph($colIndex).$rowindex;};

    //name of the sheet
    $sheetName = $className . "_" . $academicYear;
    //file name
    $fileFullName = $sheetName;
    //message
    $nextAcademicYear = array_map(function($value)
    {
        // $date = date_create_from_format("Y", $value)->format("Y");
        // return date_add(new DateTime($date), date_interval_create_from_date_string("1 year"))->format("Y");
        $date = date("Y", strtotime($value."/01/01/"." + 1 year"));
        return $date;
    }, explode("-", $academicYear));

    $nextAcademicYear = implode("-", $nextAcademicYear);

    $message = "The students whose names follow are allowed to register in ".ucfirst(strtolower(CARDINAL_NUMBERS_[$yearNumber]))." Year of ".$domain.", under the condition of retaking and validating the mentioned modules during next year ".$nextAcademicYear.":";

    //retrieves the headers of the table
    $headers = array_keys(max($data));
    //reorganizes all data keys according to the current headers list
    $data = SortAccordingToAList($data, $headers);

    //last column index
    $lastColIndex = LAST_COL_FP;
    
    // LOGO
    $sheet->SetImage($ref(STARTING_COL_FP, STARTING_ROW_FP), PHPSPREADSHEET_IMAGE_PATH_, 'logo.png', [400, 100], 0, 0);

    // AUTHORIZATION
    $autorisation="Autorisation de création: N° 2018-00/01347/MESRSI/SG/DGESup/DIPES du 13 Septembre 2018\nAutorisation d’ouverture: N° 2018-00001511/MESRSI/SG/DGESup/DIPES du 25 Septembre 2018";
    $cellRef = $ref(STARTING_COL_FP + 4, STARTING_ROW_FP);
    $range = $cellRef.":".$ref($lastColIndex-1, STARTING_ROW_FP);
    $sheet->Write($cellRef, $autorisation);
    $sheet->MergeCells($range);
    $sheet->SetRowHeight(STARTING_ROW_FP, 25);
    $sheet->WordWrap($range);
    $sheet->SetFontSize($range, 8);
    $sheet->SetFontSize($range, 8);
    $sheet->SetAlignment($range, "center", "right");
    

    //ACADEMIC YEAR
    $lastRow = $sheet->GetLastRowIndex();
    $lastRow += 2;
    $cellRef = $ref($lastColIndex-1, $lastRow);
    $sheet->Write($cellRef, "Academic year: ".$academicYear);
    $sheet->SetRowHeight($lastRow, 14);
    $sheet->SetFontSize($cellRef, 12);
    $sheet->SetCellsToBold($cellRef);
    

    // FINAL PROCLAMATION OF RESULTS
    $lastRow = $sheet->GetLastRowIndex() + 2;
    $cellRef = $ref(STARTING_COL_FP, $lastRow);
    $range = $cellRef.":".$ref(LAST_COL_FP-1, $lastRow);
    $sheet->Write($cellRef, "FINAL PROCLAMATION OF RESULTS");
    $sheet->UnderlineText($range);
    $sheet->MergeCells($range);
    $sheet->SetCellsToBold($range);
    $sheet->SetRowHeight($lastRow, 28);
    $sheet->SetFontSize($range, 14);
    $sheet->SetCenter($range, false, true);

    // CLASS
    $lastRow = $sheet->GetLastRowIndex() + 2;
    $labelCellRef = $ref(STARTING_COL_FP + 1, $lastRow);
    $valueCellRef = $ref(STARTING_COL_FP + 2, $lastRow);
    $range = $labelCellRef.":".$valueCellRef;
    $sheet->Write($labelCellRef, "Class: ");
    $sheet->UnderlineText($labelCellRef);
    $sheet->Write($valueCellRef, ucwords($className));
    $sheet->SetCellsToBold($range);

    // MESSAGE
    $lastRow = $sheet->GetLastRowIndex() + 2;
    $cellRef = $ref(STARTING_COL_FP, $lastRow);
    $range = $cellRef.":".$ref(LAST_COL_FP - 1, $lastRow);
    $sheet->Indent($range, 3);
    $sheet->Write($cellRef, $message);
    $sheet->MergeCells($range);
    $sheet->WordWrap($range);
    $sheet->SetRowHeight($lastRow, 26);

    // HEADERS
    $lastRow = $sheet->GetLastRowIndex() + 2;
    $starting_row_4_headers = $lastRow;
    foreach($headers as $key => $header)
    {
        $cellRef = $ref(STARTING_COL_FP+$key, $lastRow);
        $sheet->Write($cellRef, $header);
        $sheet->SetCenter($cellRef, true, true);
        $sheet->SetCellsToBold($cellRef);
        $sheet->WordWrap($cellRef);
    }

    // DATA
    foreach($data as $key => $studentData)
    {
        $lastRow = $sheet->GetLastRowIndex() + 1;
        foreach($studentData as $header => $value)
        {
            $index = array_search($value, array_values($studentData));
            $cellRef = $ref(STARTING_COL_FP+$index, $lastRow);
            $sheet->Write($cellRef, $value);
            $sheet->SetAlignment($cellRef, "top");
            $sheet->WordWrap($cellRef);
        }
    }
    // ADD BORDERS
    $lastRow = $sheet->GetLastRowIndex();
    $sheet->SetBorders($ref(STARTING_COL_FP, $starting_row_4_headers).":".$ref(LAST_COL_FP-1, $lastRow));

    // EXPANDING CELLS
    $sheet->SetColumnWidth($alph(STARTING_COL_FP), 12);
    $sheet->SetColumnWidth($alph(STARTING_COL_FP+1), 25);
    $sheet->SetColumnWidth($alph(STARTING_COL_FP+2), 32);
    $sheet->SetColumnWidth($alph(STARTING_COL_FP+4), 42);
    $sheet->SetColumnWidth($alph(STARTING_COL_FP+5), 42);

    // ARRESTED LIST
    $lastRow = $sheet->GetLastRowIndex()+2;
    $cellRef = $ref(STARTING_COL_FP+1, $lastRow);
    $sheet->Write($cellRef, "Arrested this list to ".count($data)." name(s)");

    // DONE AT KDG
    $lastRow = $sheet->GetLastRowIndex()+2;
    $cellRef = $ref(STARTING_COL_FP+4, $lastRow);
    $sheet->Write($cellRef, "Done at Koudougou, ".getDate_En());

    // JURY MEMBERS
    $lastRow = $sheet->GetLastRowIndex()+2;
    $juryMembers_col = STARTING_COL_FP+1;
    $juryMembers_row = $lastRow;
    $juryMembers_cellRef = $ref($juryMembers_col, $lastRow);
    $sheet->Write($juryMembers_cellRef, "Jury Members");
    $sheet->UnderlineText($juryMembers_cellRef);

    // JURY'S PRESIDENT
    $juryPresident_col = STARTING_COL_FP+4;
    $juryPresident_cellRef = $ref($juryPresident_col, $juryMembers_row);
    $sheet->Write($juryPresident_cellRef, "Jury President");
    $sheet->UnderlineText($juryPresident_cellRef);



    //  XLS FILE CREATION AND SAVING'S SECTION

    //encrypts the file
    //the password = current data in php according to the following format day-month-full year
    $sheet->EncryptSheet(date("d-m-Y"));
    //renames the sheet
    $sheet->RenameSheet($sheetName);
    //die();
    //saves the file
    $sheet->Save($saveInFolder . DIRECTORY_SEPARATOR . $fileFullName . '.xlsx', $download);
}
