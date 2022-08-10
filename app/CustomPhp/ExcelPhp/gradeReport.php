<?php

require_once(app_path('CustomPhp/ExcelPhp/excel.php'));
//finds the name of the image path for tcpdf
//name of the file executing the script's folder name
$executingScriptFolderName = dirname($_SERVER['SCRIPT_FILENAME']);
//name of the current folder
$currentFolderName = dirname(__FILE__);
if (!define("PHPSPREADSHEET_IMAGE_PATH", GetRelativePath($executingScriptFolderName, $currentFolderName))) {
    define("PHPSPREADSHEET_IMAGE_PATH", GetRelativePath($executingScriptFolderName, $currentFolderName));
}
// start column
if (!define("START_COL", 1)) {
    define("START_COL", 1);
}
//starting row for writing data
if (!define("STARTING_ROW", 1)) {
    define("STARTING_ROW", 1);
}
//defines ordinal numbers from cardinal
if (!define("CARDINAL_NUMBERS", [1 => "FIRST", 2 => "SECOND", 3 => "THIRD", 4 => "FOURTH", 5 => "FIFTH", 6 => "SIXTH"])) {
    define("CARDINAL_NUMBERS", [1 => "FIRST", 2 => "SECOND", 3 => "THIRD", 4 => "FOURTH", 5 => "FIFTH", 6 => "SIXTH"]);
}

//colors
if (!define("LITE_GREY", 'fff2f2f2')) {
    define("LITE_GREY", 'fff2f2f2');
}

if (!define("GREY", 'ffd9d9d9')) {
    define("GREY", 'ffd9d9d9');
}

if (!define("BLUE", '0070C0')) {
    define("BLUE", '0070C0');
}


//constants for headers
if (!define("SEMESTER", "Semester")) {
    define("SEMESTER", "Semester");
}
if (!define("TU", "TU")) {
    define("TU", "TU");
}
if (!define("TUE", "TUE")) {
    define("TUE", "TUE");
}
if (!define("TUE_CREDITS", "TUE Credits")) {
    define("TUE_CREDITS", "TUE Credits");
}
if (!define("TU_AVERAGE", "TU Average")) {
    define("TU_AVERAGE", "TU Average");
}
if (!define("ACQUIRED_CREDITS", "Acquired Credits")) {
    define("ACQUIRED_CREDITS", "Acquired Credits");
}
if (!define("TU_VALIDATION", "TU Validation")) {
    define("TU_VALIDATION", "TU Validation");
}
if (!define("RATING", "Rating")) {
    define("RATING", "Rating");
}
if (!define("GRADE_20", "Grade/20")) {
    define("GRADE_20", "Grade/20");
}
if (!define("SUMMARY", "Summary")) {
    define("SUMMARY", "Summary");
}

//constants for student info
if (!define("SURNAME", "Surname")) {
    define("SURNAME", "Surname");
}
if (!define("NAME", "Name")) {
    define("NAME", "Name");
}
if (!define("GRADUATION_YEAR", "2022")) {
    define("GRADUATION_YEAR", "2022");
}
if (!define("STUDENT_ID", "bs0001")) {
    define("STUDENT_ID", "bs0001");
}
if (!define("SUBJECT", "Computer Science")) {
    define("SUBJECT", "Computer Science");
}

//function to reorganize data
function ReorganizeData($data): array
{
    $returnedData = [];

    for ($i = 0; $i < count($data); $i++) {
        //list of tu
        $tu = [];
        //list of tue
        $tue = [];
        //list of tu average
        $tu_average = [];
        //list of acquired credits
        $acquired_credits = [];
        //list of tu validation
        $tu_validation = [];
        //list of ratings
        $rating = [];
        //list of grade
        $grade = [];
        //list of tue credits
        $tue_credits = [];
        //list of summary titles
        $summaries = [];
        //summary data
        $summary = [];
        //semester
        $semesterTitle = $data[$i][SEMESTER];
        //tu data
        foreach ($data[$i][TU] as $tuName => $content) {
            $tu[] = $tuName;
            $tue[] = $content[TUE];
            $tue_credits[] = $content[TUE_CREDITS];
            $tu_average[] = $content[TU_AVERAGE];
            $acquired_credits[] = $content[ACQUIRED_CREDITS];
            $tu_validation[] = $content[TU_VALIDATION];
            $rating[] = $content[RATING];
            $grade[] = $content[GRADE_20];
        }
        //summary data
        foreach ($data[$i][SUMMARY] as $summaryName => $content) {
            $summary[SEMESTER] = $summaryName;
            $summary[TUE_CREDITS] = $content[TUE_CREDITS];
            $summary[TU_AVERAGE] = $content[TU_AVERAGE];
            $summary[ACQUIRED_CREDITS] = $content[ACQUIRED_CREDITS];
            $summary[TU_VALIDATION] = $content[TU_VALIDATION];
            $summary[RATING] = $content[RATING];
        }
        //flattens multi dims arrays
        $tue_credits = flatten($tue_credits);
        $tue = flatten($tue);
        $grade = flatten($grade);

        $returnedData[] = [
            SEMESTER => $semesterTitle,
            SUMMARY => $summary,
            TU => $tu,
            TU_AVERAGE => $tu_average,
            TUE_CREDITS => $tue_credits,
            TUE => $tue,
            TU_VALIDATION => $tu_validation,
            ACQUIRED_CREDITS => $acquired_credits,
            GRADE_20 => $grade,
            RATING => $rating
        ];
    }

    return $returnedData;
}

//function to find the
//function to apply same formatting for the TU Average, Acquired Credits, TU Validation and Rating since they are the same
/**
 * @param $array = the semester's data
 * @param $lastRow = the last row index
 * @param $colStart = the column where the data will be written
 * @param $originalData = the original array of data where the data are from
 * @param $currentIndex = the current index of the loop in the reorganized data issued from the original data
 * @param $alphabet = list of alphabet characters that will be used as the columns name
 * @param $sheet = instance of the ExcelXport class
 * @param bool $isTU checks whether these data we are writing in the Excel file is an TU title
 */
function CellFormat($array, $lastRow, $colStart, $originalData, $currentIndex, $alphabet, $sheet, bool $isTU = false): void
{
    $row  = $lastRow;
    //tu data
    $tu = $originalData[$currentIndex][TU];
    for ($i = 0; $i < count($array); $i++) // - 1 due the row of the summary
    {
        $tuName = array_keys($tu)[$i];
        $tueLength = count($tu[$tuName][TUE]); //counts the number of rows to merge (gets the current semester data, then the TU and through its title, we fetch the TUE
        $sheet->Write($alphabet[$colStart] . $row, $array[$i]);
        $sheet->WordWrap($alphabet[$colStart] . $row);
        $sheet->SetBorders($alphabet[$colStart] . $row . ':' . $alphabet[$colStart] . ($row + $tueLength - 1));
        $sheet->SetCenter($alphabet[$colStart] . $row . ':' . $alphabet[$colStart] . ($row + $tueLength - 1), true);
        $sheet->SetCellsToBold($alphabet[$colStart] . $row);
        if ($isTU) {
            $sheet->MergeCells($alphabet[$colStart] . $row . ':' . $alphabet[$colStart + 1] . ($row + $tueLength - 1));
            $sheet->SetFontSize($alphabet[$colStart] . $row . ':' . $alphabet[$colStart + 1] . ($row + $tueLength - 1), 9);
        } else {
            $sheet->SetCellsToBold($alphabet[$colStart] . $row);
            $sheet->MergeCells($alphabet[$colStart] . $row . ':' . $alphabet[$colStart] . ($row + $tueLength - 1));
            $sheet->SetCenter($alphabet[$colStart] . $row . ':' . $alphabet[$colStart] . ($row + $tueLength - 1), true, true);
        }
        $row += $tueLength;
    }
}

//function to write student info into cells
function WriteStudentInfo($sheet, $range, $content, $bgColor = 'ffffffff'): void
{
    $cells = explode(':', $range);
    $cell = $cells[0];
    $sheet->Write($cell, $content);
    $sheet->SetCenter($cell, true);
    $sheet->SetColor($cell, $bgColor);
    $sheet->MergeCells($range);
    $sheet->SetFontSize($cell, 12);
    if ($bgColor == 'ffffffff') {
        $sheet->SetCellsToBold($cell);
    } else {
        $sheet->SetBorders($range, 'bottom', 'BORDER_DOTTED');
    }
}

//function to create cells
function CreateCellRange($startCol, $endCol, $row): string
{
    return $startCol . $row . ':' . $endCol . $row;
}

//function to bulk write student info
function bulkWriteStudentInfo(ExcelXport $sheet, array $data, int $row, array $alphabet): void
{

    $colIndex1 = START_COL - 1;
    $colIndex2 = START_COL + 6 - 1;
    $initialRow = $row;

    for ($i = 0; $i < count($data); $i++) {
        foreach ($data[$i] as $key => $value) {
            $index  = array_search($key, array_keys($data[$i]));
            if ($i % 2 == 0) {
                $range = CreateCellRange($alphabet[$colIndex1], $alphabet[$colIndex1 + 1], $row + $index);
                WriteStudentInfo($sheet, $range, $key);
                $range = CreateCellRange($alphabet[$colIndex1 + 2], $alphabet[$colIndex1 + 4], $row + $index);
                WriteStudentInfo($sheet, $range, $value, LITE_GREY);
                //when the index == 1, we increase the row size
                if ($index == 1) {
                    $sheet->SetRowHeight(($row + $index), 20);
                }
            } else {
                $range = CreateCellRange($alphabet[$colIndex2], $alphabet[$colIndex2 + 1], $row + $index);
                WriteStudentInfo($sheet, $range, $key);
                $range = CreateCellRange($alphabet[$colIndex2 + 2], $alphabet[$colIndex2 + 3], $row + $index);
                WriteStudentInfo($sheet, $range, $value, LITE_GREY);
            }
            //$row++;
        }
        $row = $initialRow;
    }
}


/**
 * @param $data
 * @param $studentId
 * @param $studentSurname
 * @param $studentName
 * @param $class
 * @param $semester
 * @param $academicYear
 * @param $graduationYear
 * @param $academicDirector
 * @param $academicDirectorTitle
 * @param $saveInFolder
 * @return void
 * @throws \PhpOffice\PhpSpreadsheet\Exception
 */
function GradeReport($data, $studentId, $studentSurname, $studentName, $class, $semester, $academicYear, $graduationYear, $academicDirector, $academicDirectorTitle, $saveInFolder = ''): void
{
    $download = empty($saveInFolder);


    //date
    $date = date('l F , Y');
    $date = explode(',', $date);
    $date = $date[0] . ordinal(date('d')) . ',' . $date[1];

    //new Excel object
    $sheet = new ExcelXport();


    //student info
    $studentInfo = [
        [
            "Surname" => $studentSurname,
            "Name" => $studentName,
            "Student ID" => $studentId,
        ],
        [
            "Academic Year" => $academicYear,
            "Graduation Year" => $graduationYear,
            "Subject" => $class
        ],
    ];

    //list of alphabet characters
    $alphabet = Alphabet();

    $fileName = implode("_", [$studentSurname, $studentName, $class, $semester, $academicYear]);

    //sets the width of the 3rd col
    $sheet->SetColumnWidth($alphabet[START_COL + 1 - 1], 4);
    //sets the width of the 4th col
    $sheet->SetColumnWidth($alphabet[START_COL + 2 - 1], 12);

    $semester = CARDINAL_NUMBERS[$semester];
    $lastColIndex = START_COL + 11 - 1; //+11 columns
    $lastRow = $sheet->GetLastRowIndex() + STARTING_ROW;
    //authorization
    $sheet->MergeCells($alphabet[START_COL + 3 - 1] . $lastRow . ':' . $alphabet[$lastColIndex - 3] . $lastRow);
    $sheet->SetCenter($alphabet[START_COL - 1] . $lastRow . ':' . $alphabet[$lastColIndex] . $lastRow, true, true);
    $sheet->Write($alphabet[START_COL + 3 - 1] . $lastRow, "Autorisation de création: N° 2018-00/01347/MESRSI/SG/DGESup/DIPES du 13 Septembre 2018\nAutorisation d’ouverture: N° 2018-00001511/MESRSI/SG/DGESup/DIPES du 25 Septembre 2018");
    $sheet->WordWrap($alphabet[START_COL - 1] . $lastRow . ':' . $alphabet[$lastColIndex] . $lastRow);
    $sheet->SetFontSize($alphabet[START_COL + 3 - 1] . $lastRow, 8);
    $sheet->SetRowHeight($lastRow, 30);

    $lastRow = $sheet->GetLastRowIndex() + 1;
    //sets the logo
    $sheet->MergeCells($alphabet[START_COL - 1] . $lastRow . ':' . $alphabet[START_COL + 5 - 3] . ($lastRow + 3));
    $sheet->SetImage($alphabet[START_COL - 1] . $lastRow, PHPSPREADSHEET_IMAGE_PATH, 'logo.png', [900, 80], 0, 10);

    //Burkina Faso
    $html = "<b><font size='22'>B</font>URKINA <font size='22'>F</font>ASO<br>Ministry of Higher Education, Scientific<br>Research and Innovation</b>";
    $sheet->WriteHtml($alphabet[$lastColIndex - 4] . $lastRow, $html);
    $sheet->MergeCells($alphabet[$lastColIndex - 4] . $lastRow . ':' . $alphabet[$lastColIndex - 1] . ($lastRow + 3));
    $sheet->SetAlignment($alphabet[$lastColIndex - 4] . $lastRow . ':' . $alphabet[$lastColIndex - 1] . ($lastRow + 3), 'center', 'right');
    $sheet->SetCellsToBold($alphabet[$lastColIndex - 4] . $lastRow . ':' . $alphabet[$lastColIndex - 1] . ($lastRow + 3));
    $sheet->WordWrap($alphabet[$lastColIndex - 4] . $lastRow . ':' . $alphabet[$lastColIndex - 1] . ($lastRow + 3));

    //Grade Transcript title
    $lastRow = $sheet->GetLastRowIndex() + 2;
    $sheet->Write($alphabet[START_COL + 1 - 1] . $lastRow, 'Grade Transcript');
    $sheet->SetCellsToBold($alphabet[START_COL + 1 - 1] . $lastRow);
    $sheet->MergeCells($alphabet[START_COL + 1 - 1] . $lastRow . ':' . $alphabet[$lastColIndex - 1 - 1] . ($lastRow + 1));
    $sheet->SetFontSize($alphabet[START_COL + 1 - 1] . $lastRow, 22);
    $sheet->SetBorders($alphabet[START_COL + 1 - 1] . $lastRow . ':' . $alphabet[$lastColIndex - 1 - 1] . ($lastRow + 1), 'bottom');
    $sheet->SetCenter($alphabet[START_COL + 1 - 1] . $lastRow, true, true);

    //write student info
    $lastRow = $sheet->GetLastRowIndex() + 2;
    bulkWriteStudentInfo($sheet, $studentInfo, $lastRow, $alphabet);

    //writes headers
    $lastRow = $sheet->GetLastRowIndex() + 2;
    //keeps the headers row number
    $headersRowNumber = $lastRow;
    $headerStartCol = START_COL + 1 - 1;
    //TU
    $sheet->Write($alphabet[$headerStartCol] . $lastRow, TU);
    $sheet->MergeCells($alphabet[$headerStartCol] . $lastRow . ":" . $alphabet[$headerStartCol + 1] . $lastRow);
    //TUE
    $sheet->Write($alphabet[$headerStartCol + 2] . $lastRow, TUE);
    $sheet->MergeCells($alphabet[$headerStartCol + 2] . $lastRow . ":" . $alphabet[$headerStartCol + 3] . $lastRow);
    //TUE Credits
    $sheet->Write($alphabet[$headerStartCol + 4] . $lastRow, TUE_CREDITS);
    //Grade/20
    $sheet->Write($alphabet[$headerStartCol + 5] . $lastRow, GRADE_20);
    //TU Average
    $sheet->Write($alphabet[$headerStartCol + 6] . $lastRow, TU_AVERAGE);
    //Acquired Credits
    $sheet->Write($alphabet[$headerStartCol + 7] . $lastRow, ACQUIRED_CREDITS);
    //TU Validation
    $sheet->Write($alphabet[$headerStartCol + 8] . $lastRow, TU_VALIDATION);
    //Rating
    $sheet->Write($alphabet[$headerStartCol + 9] . $lastRow, RATING);

    //sets border
    // -1 is due to the blank cell
    $sheet->SetBorders($alphabet[$headerStartCol - 1] . $lastRow . ':' . $alphabet[$headerStartCol + 9] . $lastRow);
    $sheet->SetBorders($alphabet[$headerStartCol - 1] . $lastRow . ':' . $alphabet[$headerStartCol + 9] . $lastRow, 'outline', 'BORDER_MEDIUM');
    //sets the color
    $sheet->SetColor($alphabet[$headerStartCol - 1] . $lastRow . ':' . $alphabet[$headerStartCol + 9] . $lastRow, GREY);
    //sets alignment
    $sheet->SetCenter($alphabet[$headerStartCol - 1] . $lastRow . ':' . $alphabet[$headerStartCol + 9] . $lastRow, true, true);
    //word wraps
    $sheet->WordWrap($alphabet[$headerStartCol - 1] . $lastRow . ':' . $alphabet[$headerStartCol + 9] . $lastRow);
    //sets cells to bold
    $sheet->SetCellsToBold($alphabet[$headerStartCol - 1] . $lastRow . ':' . $alphabet[$headerStartCol + 9] . $lastRow);
    //sets the height of the row
    $sheet->SetRowHeight($lastRow, 28);

    //write data
    $lastRow = $sheet->GetLastRowIndex() + 1;
    $semestersData = ReorganizeData($data);
    for ($j = 0; $j < count($semestersData); $j++) {
        //each semester
        $semesterData = $semestersData[$j];
        //length of semester data
        $countTUE = count($semesterData[TUE]);
        //semester last row
        $semesterLastRow = $lastRow + $countTUE + 1 - 1;
        //writes the semester title
        $colStart = START_COL - 1;
        $sheet->Write($alphabet[$colStart] . $lastRow, $semesterData[SEMESTER]);
        $sheet->Rotate($alphabet[$colStart] . $lastRow, 90);
        $sheet->SetCenter($alphabet[$colStart] . $lastRow, true, true);
        $sheet->SetColor($alphabet[$colStart] . $lastRow, GREY);
        $sheet->MergeCells($alphabet[$colStart] . $lastRow . ':' . $alphabet[$colStart] . ($semesterLastRow)); //plus summary line
        $sheet->SetBorders($alphabet[$colStart] . $lastRow . ':' . $alphabet[$colStart] . ($semesterLastRow), 'outline', 'BORDER_MEDIUM');

        //tu
        $row  = $lastRow;
        CellFormat($semesterData[TU], $lastRow, ($colStart + 1), $data, $j, $alphabet, $sheet, $isTU = true);

        //TUE
        $row  = $lastRow;
        for ($i = 0; $i <  count($semesterData[TUE]); $i++) {
            $tue = $semesterData[TUE];
            $col = $colStart + 3;
            $sheet->Write($alphabet[$col] . $row, $tue[$i]);
            $sheet->MergeCells($alphabet[$col] . $row . ':' . $alphabet[$col + 1] . $row);
            $sheet->SetBorders($alphabet[$col] . $row . ':' . $alphabet[$col + 1] . $row);
            $sheet->SetCenter($alphabet[$col] . $row . ':' . $alphabet[$col + 1] . $row, true);
            $row++;
        }
        //TUE Credits
        $row  = $lastRow;
        for ($i = 0; $i <  count($semesterData[TUE_CREDITS]); $i++) {
            $tue_credits = $semesterData[TUE_CREDITS];
            $col = $colStart + 5;
            $sheet->Write($alphabet[$col] . $row, $tue_credits[$i]);
            $sheet->SetBorders($alphabet[$col] . $row);
            $sheet->SetCenter($alphabet[$col] . $row, true, true);
            $row++;
        }

        //Grade/20
        $row  = $lastRow;
        for ($i = 0; $i <  count($semesterData[GRADE_20]); $i++) {
            $grade = $semesterData[GRADE_20];
            $col = $colStart + 6;
            $sheet->Write($alphabet[$col] . $row, $grade[$i]);
            $sheet->SetBorders($alphabet[$col] . $row);
            $sheet->SetBorders($alphabet[$col] . $row, "bottom", "BORDER_MEDIUM");
            $sheet->SetCenter($alphabet[$col] . $row, true, true);
            $row++;
        }

        //TU Average
        CellFormat($semesterData[TU_AVERAGE], $lastRow, ($colStart + 7), $data, $j, $alphabet, $sheet);
        //Acquired Credits
        CellFormat($semesterData[ACQUIRED_CREDITS], $lastRow, ($colStart + 8), $data, $j, $alphabet, $sheet);
        //TU Validation
        CellFormat($semesterData[TU_VALIDATION], $lastRow, ($colStart + 9), $data, $j, $alphabet, $sheet);
        //RATING
        CellFormat($semesterData[RATING], $lastRow, ($colStart + 10), $data, $j, $alphabet, $sheet);
        //increases the font size of the rating cell
        $sheet->SetFontSize($alphabet[$colStart + 10] . $lastRow, 12);

        //summary
        $lastRow = $semesterLastRow; //plus 1 row
        $summary = $semesterData[SUMMARY];

        $sheet->Write($alphabet[$colStart + 1] . $lastRow, $summary[SEMESTER]);
        //merges cells for the summary name
        $sheet->MergeCells($alphabet[$colStart + 1] . $lastRow . ':' . $alphabet[$colStart + 4] . $lastRow);
        $sheet->Write($alphabet[$colStart + 5] . $lastRow, $summary[TUE_CREDITS]);
        //leaves one cell blank
        $sheet->Write($alphabet[$colStart + 7] . $lastRow, $summary[TU_AVERAGE]);
        $sheet->Write($alphabet[$colStart + 8] . $lastRow, $summary[ACQUIRED_CREDITS]);
        $sheet->Write($alphabet[$colStart + 9] . $lastRow, $summary[TU_VALIDATION]);
        $sheet->Write($alphabet[$colStart + 10] . $lastRow, $summary[RATING]);
        //sets the font color for the TU Validation and the Rating
        $sheet->SetTextColor($alphabet[$colStart + 9] . $lastRow . ':' . $alphabet[$colStart + 10] . $lastRow, BLUE);
        $sheet->SetCellsToBold($alphabet[$colStart + 1] . $lastRow . ':' . $alphabet[$colStart + 10] . $lastRow);
        $sheet->SetColor($alphabet[$colStart + 1] . $lastRow . ':' . $alphabet[$colStart + 10] . $lastRow, GREY);
        $sheet->SetBorders($alphabet[$colStart + 1] . $lastRow . ':' . $alphabet[$colStart + 10] . $lastRow);
        $sheet->SetBorders($alphabet[$colStart + 1] . $lastRow . ':' . $alphabet[$colStart + 10] . $lastRow, 'outline', 'BORDER_MEDIUM');
        $sheet->SetCenter($alphabet[$colStart + 1] . $lastRow . ':' . $alphabet[$colStart + 10] . $lastRow, true, true);
        $sheet->SetCellsToItalic($alphabet[$colStart + 1] . $lastRow . ':' . $alphabet[$colStart + 10] . $lastRow);
        $sheet->SetRowHeight($lastRow, 20);

        //creates breakpoints for each tu and underlines it
        $row = $headersRowNumber;
        if ($j > 0) {
            $row = $lastRow - count($semesterData[TUE]) - 1; // - 1 due to the summary line which adds the number of lines
        }
        for ($k = 0; $k < count($data[$j][TU]); $k++) {
            $tuName = array_keys($data[$j][TU])[$k];
            $tuLength = count($data[$j][TU][$tuName][TUE]); //counts the number of rows to merge (gets the current semester data, then the TU and through its title, we fetch the TUE
            $row += $tuLength;
            $sheet->SetBorders($alphabet[$colStart + 1] . $row . ':' . $alphabet[$colStart + 10] . $row, 'bottom', 'BORDER_MEDIUM');
        }
        $lastRow += 1;
    }


    //auto sizes the TU Validation column
    $tuValidationColIndex = $sheet->GetColumnIndex(STARTING_ROW + 15 - 1, count($alphabet), TU_VALIDATION);
    $sheet->SetColumnWidthAuto($alphabet[$tuValidationColIndex]);
    //word wraps the text in each cell
    $sheet->WordWrap($alphabet[$headerStartCol] . (STARTING_ROW + 15 - 1) . ':' . $alphabet[$headerStartCol + 9] . ($lastRow - 1));
    //adds borders
    $sheet->SetBorders($alphabet[$headerStartCol] . (STARTING_ROW + 15 - 1) . ':' . $alphabet[$headerStartCol + 9] . ($lastRow - 1), 'right', 'BORDER_MEDIUM');
    // sizes the columns' width of the TUE
    $sheet->SetColumnWidth($alphabet[START_COL + 3 - 1], 12);
    $sheet->SetColumnWidth($alphabet[START_COL + 4 - 1], 12);

    $lastRow = $sheet->GetLastRowIndex() + 2;
    //last cells
    //town and date
    $sheet->Write($alphabet[$lastColIndex - 4] . $lastRow, 'Koudougou, ' . $date);
    $sheet->MergeCells($alphabet[$lastColIndex - 4] . $lastRow . ':' . $alphabet[$lastColIndex - 1] . $lastRow);
    $sheet->SetAlignment($alphabet[$lastColIndex - 4] . $lastRow . ':' . $alphabet[$lastColIndex - 1] . $lastRow, 'center', 'right');

    $lastRow = $sheet->GetLastRowIndex() + 2;
    //nb
    $sheet->Write($alphabet[START_COL - 1] . $lastRow, "NB:  - A semester is validated if and only if the semester average ≥ 10 and the average of each TU ≥ 08;
         - Any nature or overload causes the invalidity of this document;
         - Only one transcript is issued. It is up to the interested party to make certified copies.");
    $sheet->SetCellsToItalic($alphabet[START_COL - 1] . $lastRow);
    $sheet->MergeCells($alphabet[START_COL - 1] . $lastRow . ":" . $alphabet[$lastColIndex - 5] . ($lastRow + 4));
    $sheet->SetCenter($alphabet[START_COL - 1] . $lastRow . ":" . $alphabet[$lastColIndex - 5] . ($lastRow + 4), true);
    $sheet->WordWrap($alphabet[START_COL - 1] . $lastRow . ":" . $alphabet[$lastColIndex - 5] . ($lastRow + 4));
    $sheet->SetFontSize($alphabet[START_COL - 1] . $lastRow, 11);

    //	Academic Director
    $lastRow++;
    $sheet->WriteHtml($alphabet[$lastColIndex - 3] . $lastRow, "<b><u>Academic Director</u></b>");
    $sheet->MergeCells($alphabet[$lastColIndex - 3] . $lastRow . ":" . $alphabet[$lastColIndex - 2] . $lastRow);
    $sheet->SetFontSize($alphabet[$lastColIndex - 3] . $lastRow, 11);
    $sheet->SetAlignment($alphabet[$lastColIndex - 3] . $lastRow . ':' . $alphabet[$lastColIndex - 2] . $lastRow, 'center', 'right');


    $lastRow = $sheet->GetLastRowIndex() + 2;
    $lastRow += 4;
    //academic director's name
    $sheet->WriteHtml($alphabet[$lastColIndex - 4] . $lastRow, "<b><u> $academicDirector </u></b>");
    $sheet->SetCenter($alphabet[$lastColIndex - 4] . $lastRow, true, true);
    $sheet->MergeCells($alphabet[$lastColIndex - 4] . $lastRow . ":" . $alphabet[$lastColIndex - 1] . $lastRow);
    $sheet->SetFontSize($alphabet[$lastColIndex - 4] . $lastRow, 11);
    //title of the academic director
    $lastRow++;
    $sheet->WriteHtml($alphabet[$lastColIndex - 4] . $lastRow, "<i>$academicDirectorTitle</i>");
    $sheet->SetCenter($alphabet[$lastColIndex - 4] . $lastRow, true, true);
    $sheet->MergeCells($alphabet[$lastColIndex - 4] . $lastRow . ":" . $alphabet[$lastColIndex - 1] . $lastRow);
    $sheet->SetFontSize($alphabet[$lastColIndex - 4] . $lastRow, 9);

    //sets printing area of the sheet
    $lastRow = $sheet->GetLastRowIndex();
    $sheet->SetPrintingArea($alphabet[START_COL - 1] . STARTING_ROW . ":" . $alphabet[$lastColIndex] . $lastRow);
    $sheet->EncryptSheet(date("d-m-Y"));
    $sheet->save($saveInFolder . $fileName . ".xlsx", $download);
}
