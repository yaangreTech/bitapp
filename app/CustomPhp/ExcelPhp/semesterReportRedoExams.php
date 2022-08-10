<?php

require_once(app_path('CustomPhp/ExcelPhp/excel.php'));


//finds the name of the image path for tcpdf
//name of the file executing the script's folder name
$executingScriptFolderName = dirname($_SERVER['SCRIPT_FILENAME']);
//name of the current folder
$currentFolderName = dirname(__FILE__);
_define("PHPSPREADSHEET_IMAGE_PATH", GetRelativePath($executingScriptFolderName, $currentFolderName));

//creation of constant variables
_define('GREEN', "00cc6a");
_define('RED', "ff033c");
_define('LITE_YELLOW', 'fffcf7b6');
_define('SKY_BLUE', 'ffb8cce4');
_define('LITE_DARK', '272822');
_define('LITE_GREY', 'ffE9E9E9');

//defines constants for the tus, tue, and tu code
_define("TUS", "TUS");
_define("TUE", "TUE");
_define("TU_CODE", "TU CODE");

//starting column to write data
_define("STARTING_COL_SR", 1);
//starting row for writing data
_define('STARTING_ROW_SR', 2);
// dd(STARTING_ROW_sr);
//starting row for inserting data related to students (in cols axis)
_define("SD_STARTING_COL", 5);
//starting row for inserting data related to students (in rows axis)
_define("SD_STARTING_ROW", 22);
//defines ordinal numbers from cardinal
_define("CARDINAL_NUMBERS", [1 => "FIRST", 2 => "SECOND", 3 => "THIRD", 4 => "FOURTH", 5 => "FIFTH", 6 => "SIXTH", 7 => "SEVEN", 8 => "EIGHT", 9 => "NINE", 10 => "TEN"]);


/**
 * @param array $headers
 * @param array $student_data
 * @param string $className
 * @param string $semesterNumber
 * @param string $academicYear
 * @param string $session
 * @param string $trainingArea
 * @param string $mention
 * @param string $speciality
 * @param string $classPromotion
 * @param string $semesterId
 * @param string $saveInFolder
 * @return void
 * @throws \PhpOffice\PhpSpreadsheet\Exception
 */
function SemesterReportRedoExams($headers = [], $student_data = [], $className, $semesterNumber, $academicYear, $session, $trainingArea, $mention, $speciality, $classPromotion, $semesterId = "", $returnSheet = true, $cle = 'normal', $saveInFolder = '')
{
    $download = empty($saveInFolder);
    $sheet = new ExcelXport();

    //name of the sheet
    $sheetName = "S " . $semesterNumber." ".$cle;
    //ordinal number of the semester
    $semesterNumber = CARDINAL_NUMBERS[$semesterNumber];
    //file name
    $fileFullName = $className . "_" . $semesterNumber . "_SEMESTER_" . $academicYear;


    //extra header columns
    $extra_headers = [];
    //list of tus and their modules
    $tus_modules = [];
    foreach ($headers as $key => $value) {
        if (is_array($value)) {
            $tus_modules[$key] = $value;
        } else {
            $extra_headers[$key] = $value;
        }
    }
    //retrieves the first key of the array | by default it must be `TUS` and the only one key, thus the term `TUS` could be replaced by another word
    $tus_modules = $tus_modules[array_key_first($tus_modules)];
    $tempo = array_map(null, $tus_modules);

    //modules | retrieves the name of the modules and their credits
    $modules = [];
    foreach ($tempo as $key => $value) {
        if (is_array($value)) {
            $value = $value[TUE];
            $modules = $modules + $value;
        }
    }

    $final_headers = $modules + $extra_headers;

    //puts the array of student data in the correct order (following the order of the modules and the extra header)
    $student_data = SortAccordingToAList($student_data, ["id", "Surname", "Name", ...array_keys($final_headers)]);


    //the number of columns that the data in the header will occupy
    $nbColHeaders = count($final_headers);

    //the number of students
    $nbStudents = count($student_data);

    //gets alphabetical chars in an array
    global $alphabet;
    $alphabet = range('A', 'Z');
    //adds more strings to the alphabets like AA, AB, AC, ...
    foreach (range('A', 'Z') as $char) {
        $alphabet[] = 'A' . $char;
    }

    //returns the corresponding column by reducing automatically by 1 to the passed index
    $alph = function ($index) use ($alphabet) {
        return $alphabet[$index - 1];
    };

    //creates a cell reference
    $ref = function ($colIndex, $rowindex) use ($alph) {
        return $alph($colIndex) . $rowindex;
    };



    //  LOGO AND THE ACADEMIC YEAR'S SECTION

    //sets the logo
    $sheet->SetImage($ref(2, STARTING_ROW_SR), PHPSPREADSHEET_IMAGE_PATH, 'logo.png', [920, 120], 0, 0);

    //academic year
    $start = $ref(15, STARTING_ROW_SR);
    $end = $ref(20, STARTING_ROW_SR);
    $sheet->Write($start, "ACADEMIC YEAR: " . $academicYear);
    $sheet->MergeCells($start . ":" . $end);
    $sheet->SetCenter($start, $end, true, true);
    $sheet->SetCellsToBold($start . ":" . $end);

    // minutes of deliberation
    $start = $ref(7, STARTING_ROW_SR + 5);
    $end = $ref(11, STARTING_ROW_SR + 5);
    $sheet->Write($start, "Minutes of deliberation");
    $sheet->MergeCells($start . ":" . $end);
    $sheet->SetCenter($start, $end, true, true);
    $sheet->SetCellsToBold($start . ":" . $end);

    $sheet->UnderlineText($start . ":" . $end);

    $sheet->SetRowHeight(STARTING_ROW_SR + 5, 22);
    $sheet->SetFontSize($start . ":" . $end, 18);

    $lastRow = $sheet->GetLastRowIndex();
    $lastRow = $lastRow + 2;
    $temp = $lastRow;
    //minutes of deliberation data
    /*manages labels*/
    $labelCol = 8;
    $sheet->Write($ref($labelCol, $lastRow++), "Session: ");
    $sheet->Write($ref($labelCol, $lastRow++), "Training area: ");
    $sheet->Write($ref($labelCol, $lastRow++), "Mention: ");
    $sheet->Write($ref($labelCol, $lastRow++), "Speciality:	");
    $sheet->Write($ref($labelCol, $lastRow++), "Class promotion: ");
    $sheet->Write($ref($labelCol, $lastRow++), "Semester Id: ");
    $range = $ref($labelCol, $temp) . ":" . $ref($labelCol, $lastRow);
    $sheet->UnderlineText($range);
    $sheet->SetCellsToItalic($range);
    $sheet->SetCellsToBold($range);
    /*manages values*/
    $valueCol = 10;
    $sheet->Write($ref($valueCol, $temp++), $session);
    $sheet->Write($ref($valueCol, $temp++), $trainingArea);
    $sheet->Write($ref($valueCol, $temp++), $mention);
    $sheet->Write($ref($valueCol, $temp++), $speciality);
    $sheet->Write($ref($valueCol, $temp++), $classPromotion);
    $sheet->Write($ref($valueCol, $temp++), $semesterId);



    //gets the keys of the data of the header
    $keys = array_keys($headers);

    //total numbers of rows to put in italic
    $total_numbers_of_cols_to_set_in_italic = count($modules) + 1; // + 1 due to `Training Unit Elements (TUE)` additional column
    //total numbers of rows to rotate to 90deg
    $total_numbers_of_cols_to_rotate = count($headers);

    //index of the last col
    $lastColIndex = SD_STARTING_COL - 1 + $nbColHeaders;
    // dd('oooooo');
    //adds the name of the TU and the total of credits
    $lastRow = $sheet->GetLastRowIndex();
    $lastRow++;
    //adds the tue with their credits and the extra headers
    //headers description
    $final_headers_desc = ["Training Units (TU)", "TU Code", "TU Credits", "Training Unit Elements (TUE)", "TUE Credits"];
    foreach ($final_headers_desc as $keys => $value) {
        $range = $ref(SD_STARTING_COL - 1, $keys + $lastRow);
        $sheet->Write($range, $value);
        $sheet->SetCellsToBold($range);
        $sheet->SetCellsToItalic($range);
        $sheet->SetCenter($range, true);
    }
    $tu_col = 5;
    $tu_unit_row = $lastRow;
    $tu_code_row = 1 + $lastRow;
    $tu_credit_row = 2 + $lastRow;
    $sheet->SetRowHeight($tu_unit_row, 40);
    foreach ($tus_modules as $tu => $value) {
        $sheet->Write($ref($tu_col, $tu_unit_row), $tu);
        $sheet->Write($ref($tu_col, $tu_code_row), $value[TU_CODE]);
        //sums the values of each corresponding TU
        $sheet->Write($ref($tu_col, $tu_credit_row), array_sum(array_values($value[TUE])));
        //number of modules
        $n_modules = count($value[TUE]);
        //merges cells
        $sheet->MergeCells($ref($tu_col, $tu_unit_row) . ':' . $ref($tu_col + $n_modules - 1, $tu_unit_row));
        $sheet->MergeCells($ref($tu_col, $tu_code_row) . ':' . $ref($tu_col + $n_modules - 1, $tu_code_row));
        $sheet->MergeCells($ref($tu_col, $tu_credit_row) . ':' . $ref($tu_col + $n_modules - 1, $tu_credit_row));
        //centers cells content
        $sheet->SetCenter($ref($tu_col, $tu_unit_row) . ':' . $ref($tu_col + $n_modules - 1, $tu_credit_row), true, true);
        $sheet->SetCellsToBold($ref($tu_col, $tu_unit_row) . ':' . $ref($tu_col + $n_modules - 1, $tu_credit_row));
        //sets the background of the cells
        $sheet->SetColor($ref($tu_col, $tu_unit_row) . ':' . $ref($tu_col + $n_modules - 1, $tu_credit_row), LITE_GREY);
        $tu_col += $n_modules;
    }

    // UNUSED CELLS MERGING
    $sheet->MergeCells($ref(STARTING_COL_SR, $lastRow) . ":" . $ref(SD_STARTING_COL - 2, $lastRow + count($final_headers_desc) - 1));
    $sheet->MergeCells($ref($lastColIndex - count($extra_headers) + 1, $lastRow) . ":" . $ref($lastColIndex, $tu_credit_row));

    $lastRow = $sheet->GetLastRowIndex() - 2; //-2 due to the gap created
    $lastRow++;
    $tue_row = $lastRow;
    $tue_credit_row = 1 + $lastRow;
    $key_index = 0;
    $sheet->SetRowHeight($tue_row, 120);
    foreach ($final_headers as $key => $value) {
        $tue_col_Ref = $ref($key_index + SD_STARTING_COL, $tue_row);
        $tue_credit_col_Ref = $ref($key_index + SD_STARTING_COL, $tue_credit_row);
        //formats the TUE
        $sheet->Write($tue_col_Ref, $key);
        $sheet->SetCellsToBold($tue_col_Ref);
        $sheet->Rotate($tue_col_Ref, 90);
        if (in_array($key, array_keys($modules))) {
            $sheet->SetCellsToItalic($tue_col_Ref);
        }
        $sheet->SetCenter($tue_col_Ref, false, true);

        //formats the credits row
        $sheet->Write($tue_credit_col_Ref, $value);
        $sheet->SetCellsToBold($tue_col_Ref);
        //center horizontally the 2nd row
        $sheet->SetCenter($tue_credit_col_Ref, false, true);

        //if the current element is in the list of modules
        if (in_array($value, array_values($modules))) {
            //sets the color for the module
            $sheet->SetColor($tue_col_Ref, SKY_BLUE);
            //sets the color for the number of credits
            $sheet->SetColor($tue_credit_col_Ref, SKY_BLUE);
        }
        $key_index++;
    }

    //the student data headers
    $lastRow = $sheet->GetLastRowIndex();
    $lastRow++;
    $sheet->Write($ref(STARTING_COL_SR, $lastRow), 'N°');
    $sheet->SetColumnWidth($alph(STARTING_COL_SR), 5);
    //ID's column
    $sheet->Write($ref(STARTING_COL_SR + 1, $lastRow), 'ID');
    $sheet->SetColumnWidth($alph(STARTING_COL_SR + 1), 12);
    //Surname
    $sheet->Write($ref(STARTING_COL_SR + 2, $lastRow), 'Surname');
    $sheet->SetColumnWidth($alph(STARTING_COL_SR + 2), 15);
    //last name
    $sheet->Write($ref(STARTING_COL_SR + 3, $lastRow), ' Name');
    //formats the currents headers
    $range = $ref(STARTING_COL_SR, $lastRow) . ':' . $ref(STARTING_COL_SR + 3, $lastRow);
    $sheet->SetColumnWidth($alph(STARTING_COL_SR + 3), 28);
    $sheet->SetCenter($range, true, true);
    $sheet->SetCellsToBold($range);
    //merges the remaining cells
    $sheet->MergeCells($ref(SD_STARTING_COL, $lastRow) . ':' . $ref($lastColIndex, $lastRow));


    // STUDENT DATA
    $col = STARTING_COL_SR;
    $lastRow = $sheet->GetLastRowIndex();
    $lastRow++;
    $row = $lastRow;
    for ($index = 0; $index < $nbStudents; $index++)
    {
        //adds the No
        $no_cellRef = $ref(STARTING_COL_SR, $row);
        $sheet->Write($no_cellRef, $index + 1);
        $sheet->SetCenter($no_cellRef, false, true);
        $col++;
        foreach ($student_data[$index] as $key => $value) {
            // if ($key == 'Semester validation (Validated (V) /Not Validated (NV)') {
            //     $value = strtoupper($value)  == 'PASS' ? 'V' : 'NV';
            // }

            //replaces , by .
            $value = str_replace(',', '.', $value);
            if (is_numeric($value)) {
                $value = floatval($value);
            }
            //write student data in the Excel file
            $sheet->Write($ref($col, $row), $value);
            $col++;
        }
        $row++;
        $col = STARTING_COL_SR;
    }

    // LAST UPDATES ON STUDENT'S DATA (FORMATTING CELLS)
    $lastRow = $sheet->GetLastRowIndex() + 1;
    // wordwraps cells
    $range = $ref(STARTING_COL_SR, $tu_unit_row) . ":" . $ref($lastColIndex, $lastRow - 1);
    $sheet->WordWrap($range);
    // add border to cells
    $sheet->SetBorders($range);
    // centers the content about marks
    $sheet->SetCenter($range, true, true);

    // SPECIAL FORMATING FOR THE `RE-DO EXAM` COLUMN
    $redo_exams_col = $sheet->GetColumnIndex($tue_row, $lastColIndex, "Re-do Exam") + 1;
    if($redo_exams_col>0)
    {
        $range = $ref($redo_exams_col, SD_STARTING_ROW).":".$ref($redo_exams_col, $lastRow-1);
        $sheet->SetAlignment($range, "top", "left");
        $sheet->SetColor($range, RED);
        $sheet->SetCellsToBold($range);
        $sheet->SetColumnWidth($alph($redo_exams_col), 40);
    }

    // SPECIAL FORMATING FOR THE `Grade` COLUMN
    $grade_col = $sheet->GetColumnIndex($tue_row, $lastColIndex, "Grade") + 1;
    if($grade_col>0)
    {
        $range = $ref($grade_col, SD_STARTING_ROW).":".$ref($grade_col, $lastRow-1);
        $sheet->SetCellsToBold($range);
        $sheet->SetColumnWidth($alph($grade_col), 30);
    }

    // makes the text bold for "Semester validation (Validated (V) /Not Validated (NV)"
    $semester_validation_col = $sheet->GetColumnIndex($tue_row, $lastColIndex, "Semester validation (Validated (V) /Not Validated (NV)") + 1;
    $sheet->SetCellsToBold($ref($semester_validation_col, SD_STARTING_ROW).":".$ref($semester_validation_col, $lastRow-1));

    for ($i = SD_STARTING_ROW; $i <= $lastRow; $i++) {
        $value = $sheet->GetCellValue($lastColIndex - 5, $i);
        if (strtoupper($value) == "PASS") {

            $sheet->Write($ref($lastColIndex - 5, $i), 'V');
        } elseif (strtoupper($value) == "FAIL") {
            $sheet->Write($ref($lastColIndex - 5, $i), 'NV');
        }
    }

    //centers the tue row only horizontally
    $sheet->SetCenter($ref(SD_STARTING_COL, $tue_row).":".$ref($lastColIndex, $tue_row), false, true);


    // FOOTER
    //index of the last row
    $lastRow = $sheet->GetLastRowIndex();
    $lastRow++;
    // MEMBERS OF THE JURY
    $cellRef = $ref(STARTING_COL_SR + 2, $lastRow + 4);
    $sheet->Write($cellRef, "The members of the Jury");
    $sheet->SetCellsToBold($cellRef);
    $sheet->UnderlineText($cellRef);

    // DATE OF DELIBERATION
    $cellRef = $ref(STARTING_COL_SR + $nbColHeaders / 2, $lastRow + 2);
    $sheet->Write($cellRef, "Date of deliberation: " . getDate_En());
    $sheet->SetCellsToBold($cellRef);
    $sheet->UnderlineText($cellRef);

    // PRESIDENT OF THE JURY
    $cellRef = $ref(STARTING_COL_SR + $nbColHeaders / 2, $lastRow + 4);
    $sheet->Write($cellRef, "The President of the Jury");
    $sheet->SetCellsToBold($cellRef);
    $sheet->UnderlineText($cellRef);


    //  XLS FILE CREATION AND SAVING'S SECTION

    //encrypts the file
    //the password = current data in php according to the following format day-month-full year
    $sheet->EncryptSheet(date("d-m-Y"));
    //renames the sheet
    $sheet->RenameSheet($sheetName);

    if (!$returnSheet) {
        //saves the file
        $sheet->Save($saveInFolder . DIRECTORY_SEPARATOR . $fileFullName . '_' . $cle . '.xlsx', $download);
    } else {
        return $sheet;
    }
}
