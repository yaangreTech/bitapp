<?php
require_once(app_path('CustomPhp/ExcelPhp/excel.php'));

/**
 * @param $data
 * @param $headers
 * @param $weight
 * @param $subject
 * @param $teacherName
 * @param $promotion
 * @param $academicYear
 * @param string $saveInFolder name of the folder in which the file will be saved if we want it to. Must be preceded by the directroy delimiter
 * @return void
 * @throws \PhpOffice\PhpSpreadsheet\Exception
 */
function SubjectReport($data, $headers, $weight, $subject, $teacherName, $promotion, $academicYear, $saveInFolder = ''): void
{
    $download = empty($saveInFolder);
    //new Excel object
    $sheet = new ExcelXport();
    //list of alphabet characters
    $alphabet = Alphabet();
    //reorders the elements following the same orders as for headers
    $weight = SortAccordingToAList($weight, $headers);
    $weight = $weight[0];
    //reorders the elements following the same orders as for headers
    $data = SortAccordingToAList($data, $headers);
    //list of tests
    $tests = array_keys($weight);
    //name of the file
    $fileFullName = "Subject Report " . $promotion . " " . $academicYear;

    // start column
    define("START_COL_SJ", 1);
    //starting row for writing data
    define('STARTING_ROW_SJ', 1);
    //colors
    define('SKY_BLUE_SJ', 'ffb8cce4');
    define('PINK_SJ', "fff2dcdb");
    define("GREY_SJ", "FFd9d9d9");
    define('RED_SJ', "ff033c");
    define("DARK_ORANGE_SJ", "fff79646");

    //final column index
    $finalColIndex = START_COL_SJ + count($headers) - 1;


    //main header
    //merges 2 two first cells
    $sheet->MergeCells($alphabet[START_COL_SJ - 1] . STARTING_ROW_SJ . ":" . $alphabet[START_COL_SJ + 1 - 1] . STARTING_ROW_SJ);
    //merges remaing cells
    $sheet->MergeCells($alphabet[START_COL_SJ + 1 + 1 - 1] . STARTING_ROW_SJ . ":" . $alphabet[$finalColIndex] . STARTING_ROW_SJ);
    //resizes the first column width
    $sheet->SetColumnWidth($alphabet[START_COL_SJ - 1], 3);
    //resizes the first column height
    $sheet->SetRowHeight(STARTING_ROW_SJ, 40);
    //centers elements of the first row
    $sheet->SetCenter($alphabet[START_COL_SJ - 1] . STARTING_ROW_SJ . ":" . $alphabet[$finalColIndex] . STARTING_ROW_SJ, true, true);
    //sets text weight to bold
    $sheet->SetCellsToBold($alphabet[START_COL_SJ - 1] . STARTING_ROW_SJ . ":" . $alphabet[$finalColIndex] . STARTING_ROW_SJ);

    //writes headers
    $sheet->Write($alphabet[START_COL_SJ - 1] . STARTING_ROW_SJ, "COURSE");
    $sheet->Write($alphabet[START_COL_SJ + 2 - 1] . STARTING_ROW_SJ, $subject);
    $sheet->SetFontSize($alphabet[START_COL_SJ + 2 - 1] . STARTING_ROW_SJ, 22);
    /*set bg colors*/
    $sheet->SetColor($alphabet[START_COL_SJ - 1] . STARTING_ROW_SJ, PINK_SJ);
    $sheet->SetColor($alphabet[START_COL_SJ + 2 - 1] . STARTING_ROW_SJ, SKY_BLUE_SJ);
    //adds borders
    $sheet->SetBorders($alphabet[START_COL_SJ - 1] . STARTING_ROW_SJ . ":" . $alphabet[$finalColIndex] . STARTING_ROW_SJ,);
    $sheet->SetBorders($alphabet[START_COL_SJ - 1] . STARTING_ROW_SJ . ":" . $alphabet[$finalColIndex] . STARTING_ROW_SJ, "outline", "BORDER_MEDIUM");

    //jumps one line
    $sheet->SetRowHeight(STARTING_ROW_SJ + 1, 25);

    //merges cells of the 3rd row and writes data
    $sheet->MergeCells($alphabet[START_COL_SJ - 1] . (STARTING_ROW_SJ + 2) . ":" . $alphabet[START_COL_SJ + 1 - 1] . (STARTING_ROW_SJ + 2));
    $sheet->Write($alphabet[START_COL_SJ - 1] . (STARTING_ROW_SJ + 2), "Teacher");

    $sheet->MergeCells($alphabet[START_COL_SJ + 2 - 1] . (STARTING_ROW_SJ + 2) . ":" . $alphabet[START_COL_SJ + 3 - 1] . (STARTING_ROW_SJ + 2));
    $sheet->Write($alphabet[START_COL + 2 - 1] . (STARTING_ROW_SJ + 2), $teacherName);

    $sheet->MergeCells($alphabet[START_COL_SJ + 4 - 1] . (STARTING_ROW_SJ + 2) . ":" . $alphabet[START_COL_SJ + 4 + count($tests) - 1 - 1] . (STARTING_ROW_SJ + 2));
    $sheet->Write($alphabet[START_COL_SJ + 4 - 1] . (STARTING_ROW_SJ + 2), strtoupper($promotion));

    $sheet->MergeCells($alphabet[START_COL_SJ + 5 + count($tests) - 1 - 1] . (STARTING_ROW_SJ + 2) . ":" . $alphabet[$finalColIndex] . (STARTING_ROW_SJ + 2));
    $sheet->Write($alphabet[START_COL_SJ + 5 + count($tests) - 1 - 1] . (STARTING_ROW_SJ + 2), "Academic Year: " . $academicYear);
    //sets text weight to bold
    $sheet->SetCellsToBold($alphabet[START_COL_SJ - 1] . (STARTING_ROW_SJ + 2) . ":" . $alphabet[$finalColIndex] . (STARTING_ROW_SJ + 2));
    //adds borders
    $sheet->SetBorders($alphabet[START_COL_SJ - 1] . (STARTING_ROW_SJ + 2) . ":" . $alphabet[$finalColIndex] . (STARTING_ROW_SJ + 2),);
    $sheet->SetBorders($alphabet[START_COL_SJ - 1] . (STARTING_ROW_SJ + 2) . ":" . $alphabet[$finalColIndex] . (STARTING_ROW_SJ + 2), "outline", "BORDER_MEDIUM");
    /*set bg colors*/
    $sheet->SetColor($alphabet[START_COL_SJ - 1] . (STARTING_ROW_SJ + 2), GREY_SJ);
    $sheet->SetColor($alphabet[START_COL_SJ + 2 - 1] . (STARTING_ROW_SJ + 2), GREY_SJ);
    $sheet->SetColor($alphabet[START_COL_SJ + 4 - 1] . (STARTING_ROW_SJ + 2), SKY_BLUE_SJ);
    $sheet->SetColor($alphabet[START_COL_SJ + 5 + count($tests) - 1 - 1] . (STARTING_ROW_SJ + 2), GREY_SJ);
    //sets the height of the row
    $sheet->SetRowHeight(STARTING_ROW_SJ + 2, 20);
    //aligns the text
    $sheet->SetCenter($alphabet[START_COL_SJ - 1] . (STARTING_ROW_SJ + 2) . ":" . $alphabet[$finalColIndex] . (STARTING_ROW_SJ + 2), true, true);

    //jumps one row
    $sheet->SetRowHeight(STARTING_ROW_SJ + 2, 25);

    //next row
    $lastRow = $sheet->GetLastRowIndex();
    $sheet->SetRowHeight($lastRow + 1, 25);
    $lastRow++;
    $sheet->SetRowHeight($lastRow + 1, 25);
    $sheet->Write($alphabet[START_COL_SJ + 3 - 1] . ($lastRow + 1), "Grading Weights");
    $sheet->SetColor($alphabet[START_COL_SJ + 3 - 1] . ($lastRow + 1), GREY_SJ);
    //sets text weight to bold
    $sheet->SetCellsToBold($alphabet[START_COL_SJ + 3 - 1] . ($lastRow + 1));
    //aligns the text of the row
    $sheet->SetCenter($alphabet[START_COL_SJ - 1] . ($lastRow + 1) . ":" . $alphabet[$finalColIndex] . ($lastRow + 1), true, true);
    $weightsSum = 0;
    $col = START_COL_SJ + 4;
    foreach ($weight as $value) {
        $sheet->Write($alphabet[$col - 1] . ($lastRow + 1), $value . "%");
        $sheet->SetColor($alphabet[$col - 1] . ($lastRow + 1), SKY_BLUE_SJ);

        $weightsSum +=  $value;
        $col++;
    }
    $sheet->Write($alphabet[$col - 1] . ($lastRow + 1), $weightsSum . "%");
    $sheet->SetCellsToBold($alphabet[$col + 1 - 1] . ($lastRow + 1));
    $sheet->SetColor($alphabet[$col - 1] . ($lastRow + 1), GREY_SJ);

    //adds borders
    $sheet->SetBorders($alphabet[START_COL_SJ + 3 - 1] . ($lastRow + 1) . ":" . $alphabet[$col - 1] . ($lastRow + 1));
    $sheet->SetBorders($alphabet[START_COL_SJ + 3 - 1] . ($lastRow + 1) . ":" . $alphabet[$col - 1] . ($lastRow + 1), "outline", "BORDER_MEDIUM");

    //next row
    $lastRow = $sheet->GetLastRowIndex();
    $sheet->Write($alphabet[START_COL_SJ - 1] . ($lastRow + 1), "No");
    //merges the current row with the following one
    $sheet->MergeCells($alphabet[START_COL_SJ - 1] . ($lastRow + 1) . ":" . $alphabet[START_COL_SJ - 1] . ($lastRow + 2));

    //writes test name and student info
    for ($i = 0; $i < count($headers); $i++) {
        $sheet->Write($alphabet[START_COL_SJ + $i + 1 - 1] . ($lastRow + 1), $headers[$i]);
        //size the column
        $sheet->SetColumnWidth($alphabet[START_COL_SJ + $i + 1  - 1], 7 + strlen($headers[$i]));
        //merges the current cell with the following one under it
        $sheet->MergeCells($alphabet[START_COL_SJ + $i + 1 - 1] . ($lastRow + 1) . ":" . $alphabet[START_COL_SJ + $i + 1 - 1] . ($lastRow + 2));
    }
    //aligns the text of the row
    $sheet->SetCenter($alphabet[START_COL_SJ - 1] . ($lastRow + 1) . ":" . $alphabet[$finalColIndex] . ($lastRow + 1), true, true);
    //set font to bold
    $sheet->SetCellsToBold($alphabet[START_COL_SJ - 1] . ($lastRow + 1) . ":" . $alphabet[$finalColIndex] . ($lastRow + 1));

    //increase font size of 3 rows
    $sheet->SetFontSize($alphabet[START_COL_SJ - 1] . ($lastRow - 2) . ":" . $alphabet[START_COL_SJ + $finalColIndex - 1] . ($lastRow + 1), 12);

    /** bulk write data in the sheet */
    //next row
    $lastRow = $sheet->GetLastRowIndex();
    $currentRow = $lastRow + 2; //+2 due the merged row
    for ($row = 0; $row < count($data); $row++) {
        $array = $data[$row];
        //writes order number
        $sheet->Write($alphabet[START_COL_SJ - 1] . ($currentRow + $row), $row + 1);
        for ($col = 0; $col < count($headers); $col++) {
            $sheet->Write($alphabet[START_COL_SJ + $col] . ($currentRow + $row), $array[$headers[$col]]);
            //if the current value is for a test
            if (in_array($headers[$col], $tests)) {
                //changes the background of the cell
                $sheet->SetColor($alphabet[START_COL_SJ + $col] . ($currentRow + $row), SKY_BLUE_SJ);
            }
            //if the current cell record the key word "PASS"
            if (strtoupper($array[$headers[$col]]) == "PASS") {
                $sheet->SetColor($alphabet[START_COL_SJ + $col] . ($currentRow + $row), DARK_ORANGE_SJ);
            }
        }
    }

    //last row
    $lastRow = $sheet->GetLastRowIndex();
    //adds borders to the written rows
    $sheet->SetBorders($alphabet[START_COL_SJ - 1] . ($currentRow - 2) . ":" . $alphabet[START_COL_SJ + $finalColIndex - 1] . $lastRow);
    //centers content from the column of the first test
    $firstTestColIndex = $sheet->GetColumnIndex(STARTING_ROW_SJ + 5, $finalColIndex + 1, $tests[0]);
    $sheet->SetCenter($alphabet[$firstTestColIndex] . (STARTING_ROW_SJ + 5) . ":" . $alphabet[$finalColIndex] . $lastRow, true, true);
    //centers the content of the "order number column"
    $sheet->SetCenter($alphabet[START_COL_SJ - 1] . (STARTING_ROW_SJ + 5) . ":" . $alphabet[START_COL_SJ] . $lastRow, true, true);

    //sets the 3 last columns to bold
    $sheet->SetCellsToBold($alphabet[$finalColIndex - 3] . (STARTING_ROW_SJ + 5) . ":" . $alphabet[$finalColIndex] . $lastRow);
    //sets international grade column text to red
    $internationalGradeColIndex = $sheet->GetColumnIndex(STARTING_ROW_SJ + 5, $finalColIndex + 1, "International Grade");
    $sheet->SetTextColor($alphabet[$internationalGradeColIndex] . (STARTING_ROW_SJ + 6) . ":" . $alphabet[$internationalGradeColIndex] . $lastRow, RED_SJ);

    //average
    //last row
    $lastRow = $sheet->GetLastRowIndex();
    $finalAverageCOlIndex = $internationalGradeColIndex = $sheet->GetColumnIndex(STARTING_ROW_SJ + 5, $finalColIndex + 1, "Final Average");
    $averages = flatten($sheet->GetRangeValues($alphabet[$finalAverageCOlIndex] . (STARTING_ROW_SJ + 7) . ":" . $alphabet[$finalAverageCOlIndex] . $lastRow));

    $mean = round(array_sum($averages) / count($averages), 2);
    $sheet->Write($alphabet[$finalAverageCOlIndex - 1] . ($lastRow + 2), "Average");
    $sheet->Write($alphabet[$finalAverageCOlIndex] . ($lastRow + 2), $mean);
    //add borders
    $sheet->SetBorders($alphabet[$finalAverageCOlIndex - 1] . ($lastRow + 2) . ":" . $alphabet[$finalAverageCOlIndex] . ($lastRow + 2),);
    $sheet->SetBorders($alphabet[$finalAverageCOlIndex - 1] . ($lastRow + 2) . ":" . $alphabet[$finalAverageCOlIndex] . ($lastRow + 2), "outline", "BORDER_MEDIUM");

    $sheet->SetColor($alphabet[$finalAverageCOlIndex - 1] . ($lastRow + 2) . ":" . $alphabet[$finalAverageCOlIndex] . ($lastRow + 2), GREY_SJ);
    $sheet->SetCellsToBold($alphabet[$finalAverageCOlIndex - 1] . ($lastRow + 2) . ":" . $alphabet[$finalAverageCOlIndex] . ($lastRow + 2));
    $sheet->SetCenter($alphabet[$finalAverageCOlIndex - 1] . ($lastRow + 2) . ":" . $alphabet[$finalAverageCOlIndex] . ($lastRow + 2), true, true);

    //wordwraps all the file cells
    $sheet->WordWrap("A1:" . $alphabet[$finalColIndex] . $sheet->GetLastRowIndex());

    //sets columns width to auto
    $sheet->AutoSize($alphabet);

    //saves the file
    $sheet->Save($saveInFolder . $fileFullName . '.xlsx', $download);
}