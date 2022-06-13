<?php

require_once(app_path('CustomPhp/ExcelPhp/excel.php'));

//finds the name of the image path for tcpdf
//name of the file executing the script's folder name
$executingScriptFolderName = dirname($_SERVER['SCRIPT_FILENAME']);
//name of the current folder
$currentFolderName = dirname(__FILE__);
if (!define("PHPSPREADSHEET_IMAGE_PATH_", GetRelativePath($executingScriptFolderName, $currentFolderName))) {
    define("PHPSPREADSHEET_IMAGE_PATH_", GetRelativePath($executingScriptFolderName, $currentFolderName));
}

//creation of constant variables
if (!define('GREEN', "00cc6a")) {
    define('GREEN', "00cc6a");
}
if (!define('RED', "ff033c")) {
    define('RED', "ff033c");
}
if (!define('LITE_YELLOW', 'fffcf7b6')) {
    define('LITE_YELLOW', 'fffcf7b6');
}
if (!define('SKY_BLUE', 'ffb8cce4')) {
    define('SKY_BLUE', 'ffb8cce4');
}
if (!define('LITE_DARK', '272822')) {
    define('LITE_DARK', '272822');
}
// 5 index of the col F + 1 as it is an index, all starts from 0
if (!define("START_COL_Se", 4)) {
    define("START_COL_Se", 4);
}
//starting row for writing data
if (!define('STARTING_ROW_Se', 4)) {
    define('STARTING_ROW_Se', 4);
}
//defines ordinal numbers from cardinal
if (!define("CARDINAL_NUMBERS_Se", [1 => "FIRST", 2 => "SECOND", 3 => "THIRD", 4 => "FOURTH", 5 => "FIFTH", 6 => "SIXTH"])) {
    define("CARDINAL_NUMBERS_Se", [1 => "FIRST", 2 => "SECOND", 3 => "THIRD", 4 => "FOURTH", 5 => "FIFTH", 6 => "SIXTH"]);
}


/**
 * @param array $headers
 * @param array $student_data
 * @param $className
 * @param $semesterNumber
 * @param $academicYear
 * @param string $saveInFolder
 * @return void
 * @throws \PhpOffice\PhpSpreadsheet\Exception
 */
function SemesterReport($headers = [], $student_data = [], $className, $semesterNumber, $academicYear, $saveInFolder = ''): void
{
    $download = empty($saveInFolder);
    $sheet = new ExcelXport();

    //name of the sheet
    $sheetName = "SEMESTER " . $semesterNumber;
    //ordinal number of the semester
    $semesterNumber = CARDINAL_NUMBERS[$semesterNumber];
    //file name
    $fileFullName = $className . "_" . $semesterNumber . "_SEMESTER_" . $academicYear;

    //extra header columns
    $extra_headers = array_slice($headers, count($headers) - 7);
    //list of tus and their modules
    $tus_modules = array_slice($headers, 0, count($headers) - 7);
    //retrieves the first key of the array | by default it must be `TUS` and the only one key, thus the terme `TUS` could be replaced by another world
    $tus_modules = $tus_modules[array_key_first($tus_modules)];

    //modules | reteieves the name of the modules and their credits
    $modules = array_reduce($tus_modules, function ($previous, $current) {
        return $previous + $current;
    }, []);

    $headers = $modules + $extra_headers;

    //puts the array of student data in the correct order (following the order of the modules and the extra header)
    $student_data = SortAccordingToAList($student_data, ["id", "Surname", "Name", ...array_keys($headers)]);


    //the number of columns that the data in the header will occupy
    $nbColHeaders = count($extra_headers) + count($modules);

    //the number of students
    $nbStudents = count($student_data);

    //gets alphabetical chars in a array
    $alphabet = range('A', 'Z');
    //adds more strings to the alphabets like AA, AB, AC, ...
    foreach (range('A', 'Z') as $char) {
        $alphabet[] = 'A' . $char;
    }

    /***********************on top of headers: 1st row ************************************/
    //sets the width of the 4th column
    $sheet->SetColumnWidth($alphabet[3], 30);
    //sets the width of the 3th column
    $sheet->SetColumnWidth($alphabet[2], 25);
    //sets the height of the first row
    $sheet->setRowHeight(1, 40);
    //centers horizontally and vertically
    $sheet->SetCenter(1, true, true);
    //sets the font size of the text
    $sheet->SetFontSize('A1:AZ1', 18);

    //merges cells
    $sheet->MergeCells('A1:D1');
    //index of the last row
    $lastColIndex = START_COL + $nbColHeaders;
    $sheet->MergeCells($alphabet[$lastColIndex - 1 - 1] . '1:' . $alphabet[$lastColIndex - 1] . '1');
    $sheet->MergeCells('F1:' . $alphabet[$lastColIndex - 3 - 1] . '1');

    //set text of first row to bold
    $sheet->SetCellsToBold('A1:' . $alphabet[$lastColIndex - 1] . '1');

    $sheet->Write('A1', 'CLASS: ' . strtoupper($className));
    $sheet->Write('F1', $semesterNumber . ' SEMESTER GRADE REPORT SHEET');
    $sheet->Write($alphabet[$lastColIndex - 1 - 1] . '1', 'ACADEMIC YEAR: ' . $academicYear);

    //sets the width of the 4th column
    $sheet->SetColumnWidth($alphabet[$lastColIndex - 1 - 1], 50);

    //sets colors
    $sheet->SetColor('A1', LITE_YELLOW);
    $sheet->SetColor('F1', SKY_BLUE);
    $sheet->SetColor($alphabet[$lastColIndex - 1 - 1] . '1', LITE_YELLOW);

    /*************** 2nd and 3rd rows ****************** */

    //final headers data
    $finalHeaders = $modules + $extra_headers;

    //gets the keys of the data of the header
    $keys = array_keys($finalHeaders);

    //total numbers of rows to put in italic
    $total_numbers_of_rows_to_set_in_italic = count($modules);
    //total numbers of rows to rotate to 90deg
    $total_numbers_of_rows_to_rotate = count($finalHeaders);

    //merges cells from A2 to C2
    $sheet->MergeCells('A4:C4');
    //sets the height of the 2nd row
    $sheet->setRowHeight(4, 150);

    //sets the logo
    $sheet->SetImage('A4', PHPSPREADSHEET_IMAGE_PATH, 'logo.png', [880, 90], 0, 10);
    //write the slogan for the logo
    $sheet->Write('A4', '‘’Educating a New Generation of Leaders‘’');
    //centers content
    $sheet->SetCenter("A4", false, true);

    //rotates text of headers
    $sheet->Rotate('E4:' . $alphabet[START_COL + $total_numbers_of_rows_to_rotate - 1] . '4', 90);
    //centers vertically cells text of headers
    $sheet->SetCenter('E4:' . $alphabet[START_COL + $total_numbers_of_rows_to_rotate - 1] . '4', false, true);
    //sets text to bold: cells of headers
    $sheet->SetCellsToBold('E4:' . $alphabet[START_COL + $total_numbers_of_rows_to_rotate - 1] . '4');
    //sets text to italic: cells of modulus
    $sheet->SetCellsToItalic('E4:' . $alphabet[START_COL + $total_numbers_of_rows_to_set_in_italic - 1] . '4');
    //sets text to bold: cells of name, last name and number of credits
    $sheet->SetCellsToBold('A5:' . $alphabet[START_COL + $total_numbers_of_rows_to_rotate - 1] . '5');

    //adds the name of the TU and the total of credits
    $current_index = START_COL;
    foreach ($tus_modules as $tu => $value) {
        $sheet->Write($alphabet[$current_index] . '2', $tu);
        //sums the values of each corresponding TU
        $sheet->Write($alphabet[$current_index] . '3', array_sum(array_values($value)));
        //number of modules
        $n_modules = count($value);
        //merges cells
        $sheet->MergeCells($alphabet[$current_index] . '2' . ':' . $alphabet[$current_index + $n_modules - 1] . '2');
        $sheet->MergeCells($alphabet[$current_index] . '3' . ':' . $alphabet[$current_index + $n_modules - 1] . '3');
        //centers cells content
        $sheet->SetCenter($alphabet[$current_index] . '2' . ':' . $alphabet[$current_index + $n_modules - 1] . '3', true, true);
        $sheet->SetCellsToBold($alphabet[$current_index] . '2' . ':' . $alphabet[$current_index + $n_modules - 1] . '3');
        //sets the background of the cells
        $sheet->SetColor($alphabet[$current_index] . '2' . ':' . $alphabet[$current_index + $n_modules - 1] . '3', LITE_GREY);
        $current_index += $n_modules;
    }
    //increases the height of the row 2
    $sheet->SetRowHeight(2, 30);
    //merges cells
    $sheet->MergeCells($alphabet[0] . '2' . ':' . $alphabet[START_COL - 1] . '3');
    $sheet->MergeCells($alphabet[START_COL + $total_numbers_of_rows_to_set_in_italic] . '2' . ':' . $alphabet[START_COL + $total_numbers_of_rows_to_rotate - 1] . '3');

    //destroyes the variables
    unset($current_index);

    //adds and formats headers text
    foreach ($finalHeaders as $key => $value) {
        $key_index = array_search($key, $keys);
        $sheet->Write($alphabet[$key_index + START_COL] . '4', $key);
        $sheet->Write($alphabet[$key_index + START_COL] . '5', $value);
        //center horizontally the 2nd row
        $sheet->SetCenter($alphabet[$key_index + START_COL] . '5', false, true);

        //sets default the background color for other extra data => row for credits
        $sheet->SetColor($alphabet[$key_index + START_COL] . '5', 'ffd9d9d9');

        //if the current element is in the list of modules
        if (in_array($value, array_values($modules))) {
            //sets the color for the module
            $sheet->SetColor($alphabet[$key_index + START_COL] . '4', SKY_BLUE);
            //sets the color for the number of credits
            $sheet->SetColor($alphabet[$key_index + START_COL] . '5', SKY_BLUE);
        }

        //when the extra data header is equal to 'Total of Credits' or 'Final Average'
        if (in_array($key, ['Total of Credits', 'Final Average'])) {
            //set the background color
            $sheet->SetColor($alphabet[$key_index + START_COL] . '5', 'ffc4bd97');
        }
    }

    //sets the width of the "conversion" column
    $conversionColIndex = $sheet->GetColumnIndex(4, $lastColIndex, "Conversion");
    $sheet->SetColumnWidth($alphabet[$conversionColIndex], 30);

    //Number of row
    $sheet->Write('A5', 'N°');
    //resizes the width of the column for the orders numbers
    $sheet->SetColumnWidth('A', 3);
    //ID's column
    $sheet->Write('B5', 'ID');
    //Surname
    $sheet->Write('C5', 'Surname');
    //last name
    $sheet->Write('D5', ' Name');

    /****************** Other rows from row 6 **************** */
    $col = START_COL - 4;
    $row = STARTING_ROW;
    for ($index = 0; $index < $nbStudents; $index++) {
        //adds the No
        $sheet->Write($alphabet[$col] . $row, $index + 1);
        $col++;
        foreach ($student_data[$index] as $key => $value) {
            //replaces , by .
            $value = str_replace(',', '.', $value);
            if (is_numeric($value)) {
                $value = floatval($value);
            }
            //write student data in the excel file
            $sheet->Write($alphabet[$col] . $row, $value);
            $col++;
        }
        $row++;
        $col = START_COL - 4;
    }

    //index of the last row
    $lastRowIndex = $sheet->GetLastRowIndex();


    //sets the cells of Final Average
    $averageColIndex = $sheet->GetColumnIndex(4, count($alphabet), 'Final Average');
    $sheet->SetCellsToBold($alphabet[$averageColIndex] . STARTING_ROW . ":" . $alphabet[$averageColIndex] . $lastRowIndex);

    //sets the color of the text in to red (column `International Grade`)
    $InternationalGradeIndex = $sheet->GetColumnIndex(4, count($alphabet), 'International Grade');
    $sheet->SetTextColor($alphabet[$InternationalGradeIndex] . STARTING_ROW . ":" . $alphabet[$InternationalGradeIndex] . $lastRowIndex, RED);

    //sets the background color of columns of 'Remark', 'Re-do exam'
    $remarkColIndex = $sheet->GetColumnIndex(4, count($alphabet), 'Remark');
    $redoExamColIndex = $sheet->GetColumnIndex(4, count($alphabet), 'Re-do exam');
    $sheet->SetColor($alphabet[$remarkColIndex] . STARTING_ROW . ":" . $alphabet[$redoExamColIndex] . $lastRowIndex, RED);

    //Pass or fail?
    $pass_of_fail_colIndex = $sheet->GetColumnIndex(4, count($alphabet), 'Pass/Fail?');
    for ($row = STARTING_ROW; $row <= $lastRowIndex; $row++) {
        $value = $sheet->GetCellValue($pass_of_fail_colIndex + 1, $row);
        $color = "";
        if (in_array($value, ["", "PASS"])) {
            $color = "ff" . GREEN; //adds alpha to the color
        } else {
            $color = "ff" . RED; //adds alpha to the color
        }
        $sheet->SetColor($alphabet[$pass_of_fail_colIndex] . $row, $color);
    }

    //sets borders to writen cells
    $sheet->SetBorders('A1:' . $alphabet[4 + $total_numbers_of_rows_to_rotate - 1] . $lastRowIndex);

    //Average per subject
    $average_row_number = ($lastRowIndex + 2);
    $sheet->Write('D' . $average_row_number, 'Average per Subject');
    //finds the last module column index
    $lastModuleColIndex = $sheet->GetColumnIndex(4, count($alphabet), array_keys($modules)[$total_numbers_of_rows_to_set_in_italic - 1]);
    //calculates the average of each subject
    for ($col = START_COL + 1; $col <= $lastModuleColIndex + 1; $col++) //the function get index removes 1 and returns the result
    {
        $total = 0;
        for ($row = STARTING_ROW; $row <= $lastRowIndex; $row++) {
            $total += floatval($sheet->GetCellValue($col, $row));
        }
        $sheet->Write($alphabet[$col - 1] . $average_row_number, $total / $nbStudents);
    }
    //sets the bg color of average cell to lite blue
    $sheet->SetColor("D" . $average_row_number . ":" . $alphabet[$lastModuleColIndex] . $average_row_number, SKY_BLUE);
    $sheet->SetBorders("D" . $average_row_number . ":" . $alphabet[$lastModuleColIndex] . $average_row_number);
    $sheet->SetBorders("D" . $average_row_number . ":" . $alphabet[$lastModuleColIndex] . $average_row_number, "outline", "BORDER_MEDIUM");

    //statistics
    //titles
    //part 1
    $sheet->Write("D" . ($average_row_number + 2), "Best Average");
    $sheet->Write("D" . ($average_row_number + 3), "Lowest Average");
    $sheet->Write("D" . ($average_row_number + 4), "Class Room Average");
    $sheet->Write("D" . ($average_row_number + 5), "Percentage of Success");
    $sheet->Write("D" . ($average_row_number + 6), "Percentage of Failure");
    //part 2
    $sheet->Write("D" . ($average_row_number + 8), "Number of students");
    $sheet->Write("D" . ($average_row_number + 9), "Number of passed");
    $sheet->Write("D" . ($average_row_number + 10), "Number of fails");
    //formating
    $sheet->SetCellsToBold('D' . ($average_row_number + 2) . ":" . "D" . ($average_row_number + 10));
    //values
    $finalAverageCol = $alphabet[$sheet->GetColumnIndex(4, count($alphabet), "Final Average")];
    $pass_failColIndex = $sheet->GetColumnIndex(4, count($alphabet), "Pass/Fail?");
    //**increases the size of the column */
    $sheet->SetColumnWidth($alphabet[$pass_failColIndex], 20);
    //**sets its text weight to bold */
    $sheet->SetcellsToBold($alphabet[$pass_failColIndex] . STARTING_ROW . ":" . $alphabet[$pass_failColIndex] . $lastRowIndex);
    $pass_failCol = $alphabet[$pass_failColIndex];
    $averages = flatten($sheet->GetRangeValues($finalAverageCol . STARTING_ROW . ':' . $finalAverageCol . $lastRowIndex));
    $pass_failResults = flatten($sheet->GetRangeValues($pass_failCol . STARTING_ROW . ':' . $pass_failCol . $lastRowIndex));
    $nbFails = array_count_values($pass_failResults)['FAIL'] ?? 0;
    //retrieves the best average
    $bestAverage = round(max($averages), 2);
    //retrieves the lowest average
    $lowestAverage = round(min($averages), 2);
    //retrieves the mean of averages
    $mean = round((array_sum($averages) / $nbStudents), 2);
    //retrieves the percentage of failure
    $failurePercentage = round((($nbFails / $nbStudents) * 100), 2);
    //retrieves the percentage of success
    $successPercentage = round((100 - $failurePercentage), 2);

    //part 1
    $sheet->Write("E" . ($average_row_number + 2), $bestAverage);
    $sheet->Write("E" . ($average_row_number + 3), $lowestAverage);
    $sheet->Write("E" . ($average_row_number + 4), $mean);
    $sheet->Write("E" . ($average_row_number + 5), $successPercentage . " %");
    $sheet->Write("E" . ($average_row_number + 6), $failurePercentage . " %");
    //part 2
    $sheet->Write("E" . ($average_row_number + 8), $nbStudents);
    $sheet->Write("E" . ($average_row_number + 9), $nbStudents - $nbFails);
    $sheet->Write("E" . ($average_row_number + 10), $nbFails);
    //formatting
    $sheet->SetTextColor('E' . ($average_row_number + 2) . ":" . "E" . ($average_row_number + 10), RED);

    /***** final treatments */
    //adds borders for stats
    $sheet->SetBorders("D" . ($average_row_number + 2) . ":E" . ($average_row_number + 6));
    $sheet->SetBorders("D" . ($average_row_number + 2) . ":E" . ($average_row_number + 6), "outline", "BORDER_MEDIUM");

    $sheet->SetBorders("D" . ($average_row_number + 8) . ":E" . ($average_row_number + 10));
    $sheet->SetBorders("D" . ($average_row_number + 8) . ":E" . ($average_row_number + 10), "outline", "BORDER_MEDIUM");

    //centers text
    $sheet->SetCenter("E" . STARTING_ROW . ":" . $alphabet[$lastColIndex - 1] . ($average_row_number + 10), true, true);
    $sheet->SetCenter("A" . STARTING_ROW . ":A" . ($average_row_number + 10), true, true);

    //freezes the headers
    $sheet->FreezePane(1, 2);

    //deals with rows where the student fails
    for ($row = STARTING_ROW; $row <= $average_row_number + 10; $row++) {
        //if the student dont pass the semester, he fails
        $value = $sheet->GetCellValue($conversionColIndex + 1, $row);
        if ($value == "Not passed") {
            $sheet->SetColor("A" . $row, 'ff' . RED); //adds alpha to the bg color
            $sheet->SetColor("E" . $row . ":" . $alphabet[$lastColIndex - 1] . $row, 'ff' . RED); //adds alpha to the bg color
            $sheet->SetTextColor($alphabet[$InternationalGradeIndex] . $row, LITE_DARK);
        }
    }

    //wordwraps all the file cells
    $sheet->WordWrap("A1:" . $alphabet[$lastColIndex] . $sheet->GetLastRowIndex());

    //encrypte the file
    //the password = filename + _ + current data in php according to the following format day-month-full year
    $sheet->EncryptSheet($fileFullName . '_' . date("d-m-Y"));

    $sheet->RenameSheet($sheetName);

    //saves the file
    $sheet->Save($saveInFolder . DIRECTORY_SEPARATOR . $fileFullName . '.xlsx', $download);
}