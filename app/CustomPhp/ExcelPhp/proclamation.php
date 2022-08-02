<?php
require('excel.php');
// require("../functions.php");
require("../customHelpers.php");
//starting row
_define("STARTING_ROW_", 2);
//starting col
_define("STARTING_COL_", 1);
//number of cols that the data will occupy
_define("TOTAL_N_COLS", 9);
//headers
_define("THEADERS", ["REGISTRATION NUMBER"=>2, "NAME"=>2, "FORENAMES"=>4, "SEX"=>1, "RATING"=>1]);

/**
 * @param string $academicYear
 * @param string $sessionType
 * @param string $class
 * @param string $semester
 * @param string $message
 * @param array $data
 * @param array $juryMember
 * @param string $juryPresident
 * @return void
 * @throws \PhpOffice\PhpSpreadsheet\Exception
 */
function Proclamation(string $academicYear, string $sessionType="Normal", string $class, string $semester, string $message, array $data, array $juryMembers, string $juryPresident)
{
    //spreadsheet object
    $sheet = new ExcelXport();
    //name of the sheet
    $sheetName = $class. " " . $semester;
    //ordinal number of the semester
    //file name
    $fileFullName = $class . "_" . $semester . "_" . $academicYear;

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

    //last column index
    $lastColIndex = STARTING_COL_+TOTAL_N_COLS;

    //ACADEMIC YEAR
    $cellRef = $ref($lastColIndex-2, STARTING_ROW_);
    $sheet->Write($cellRef, "Academic year: ".$academicYear);
    $sheet->SetRowHeight(STARTING_ROW_, 14);
    $sheet->SetFontSize($cellRef, 12);
    $sheet->SetCellsToBold($cellRef);

    //PROCLAMATION OF RESULTS
    $lastRow = $sheet->GetLastRowIndex();
    $lastRow += 2;
    $start = $ref(STARTING_COL_+3, $lastRow);
    $end = $ref($lastColIndex-3, $lastRow);
    $range = $start.":".$end;
    $sheet->Write($start, "PROCLAMATION OF RESULTS");
    $sheet->SetRowHeight($lastRow, 25);
    $sheet->SetFontSize($range, 16);
    $sheet->SetCenter($range, true, true);
    $sheet->SetBorders($range, 'bottom', 'BORDER_DOUBLE');
    $sheet->MergeCells($range);
    $sheet->SetCellsToBold($range);

    // REDUCES THE SIZE OF THE GAP BETWEEN THE PROCLAMATION AND THE SESSION
    $lastRow = $sheet->GetLastRowIndex();
    $lastRow++;
    $sheet->SetRowHeight($lastRow, 8);

    //SESSION TYPE
    $lastRow = $sheet->GetLastRowIndex();
    $lastRow++;
    $start = $ref(STARTING_COL_+4, $lastRow);
    $end = $ref($lastColIndex-4, $lastRow);
    $range = $start.":".$end;
    $sheet->Write($start, "SESSION ".ucfirst($sessionType));
    $sheet->SetRowHeight($lastRow, 18);
    $sheet->SetFontSize($range, 14);
    $sheet->SetCenter($range, true, true);
    $sheet->SetBorders($range, 'bottom', 'BORDER_DOUBLE');
    $sheet->MergeCells($range);
    $sheet->SetCellsToBold($range);

    // CLASS
    $lastRow = $sheet->GetLastRowIndex();
    $lastRow += 2;
    $labelCellRef = $ref(STARTING_COL_+1, $lastRow);
    $valueCellRef = $ref(STARTING_COL_+2, $lastRow);
    $range = $labelCellRef.":".$valueCellRef;
    $sheet->Write($labelCellRef, "Class: ");
    $sheet->UnderlineText($labelCellRef);
    $sheet->Write($valueCellRef, ucwords($class));
    $sheet->SetRowHeight($lastRow, 20);
    $sheet->SetFontSize($range, 16);
    $sheet->SetCellsToBold($range);

    // SEMESTER
    $lastRow = $sheet->GetLastRowIndex();
    $lastRow ++;
    $labelCellRef = $ref(STARTING_COL_+1, $lastRow);
    $valueCellRef = $ref(STARTING_COL_+2, $lastRow);
    $range = $labelCellRef.":".$valueCellRef;
    $sheet->Write($labelCellRef, "Semester: ");
    $sheet->UnderlineText($labelCellRef);
    $sheet->Write($valueCellRef, $semester);
    $sheet->SetRowHeight($lastRow, 20);
    $sheet->SetFontSize($range, 16);
    $sheet->SetCellsToBold($range);

    //MESSAGE
    $lastRow = $sheet->GetLastRowIndex();
    $lastRow += 3;
    $cellRef = $ref(STARTING_COL_, $lastRow);
    $range = $cellRef.":".$ref($lastColIndex, $lastRow+1);
    $sheet->Indent($cellRef, 3);
    $sheet->Write($cellRef, $message);
    $sheet->MergeCells($range);
    $sheet->WordWrap($range);

    // TABLE HEADERS
    $lastRow = $sheet->GetLastRowIndex();
    $lastRow++;
    $bordersToFixFirstRow = $lastRow;
    $lastCol = 0;
    foreach (THEADERS as $title => $factor)
    {
        $start = $ref($lastCol+1, $lastRow);
        $lastCol += $factor;
        $end = $ref($lastCol, $lastRow);
        $sheet->Write($start, $title);
        $sheet->MergeCells($start.":".$end);
    }
    $range = $ref(STARTING_COL_, $lastRow).":".$ref($lastColIndex, $lastRow);
    $sheet->SetCenter($range, true, true);
    $sheet->SetRowHeight($lastRow, 30);
    $sheet->WordWrap($range);
    $sheet->SetCellsToBold($range);

    // WRITES STUDENTS DATA
    //sorts data according to the list of the table headers
    $data = SortAccordingToAList($data, array_keys(THEADERS));
    //title of the headers row
    $titles = array_keys(THEADERS);
    //the size of the headers
    $size = count($titles);
    //indexes of columns in which the content must be centered
    $cellsToCenterIndex = [$size-1, $size-2];
    //gets the last element of the THEADERS
    $sortAccordingTo = $titles[count(THEADERS)-1];
    //sorts students data according to their averages
    uasort($data, function($prev, $next) use ($sortAccordingTo){return $next[$sortAccordingTo] - $prev[$sortAccordingTo];});
    foreach ($data as $row => $value)
    {
        $lastRow = $sheet->GetLastRowIndex();
        $lastRow++;
        $lastCol = 0;
        foreach ($value as $key => $element)
        {
            $factor = THEADERS[$key];
            $start = $ref($lastCol+1, $lastRow);
            $lastCol += $factor;
            $end = $ref($lastCol, $lastRow);
            $range = $start.":".$end;
            $sheet->Write($start, $element);
            $sheet->MergeCells($range);
            $keyIndex = array_search($key, $titles);

            if(in_array($keyIndex, $cellsToCenterIndex))
            {
                $sheet->SetCenter($range, true, true);
            }
        }
    }

    // ADD BORDERS
    $lastRow = $sheet->GetLastRowIndex();
    $range = $ref(STARTING_COL_, $bordersToFixFirstRow).":".$ref($lastColIndex, $lastRow);
    $sheet->SetBorders($range);

    // ARRESTED LIST AT ...
    $lastRow += 2;
    $numberOfStudents = count($data);
    $cellRef = $ref(STARTING_COL_, $lastRow);
    $range = $cellRef.":".$ref($lastColIndex, $lastRow);
    $sheet->Write($cellRef, "Arrested this list to ".$numberOfStudents." name(s)");
    $sheet->Indent($range, 3);
    $sheet->MergeCells($range);

    // DONE AT KDG
    $lastRow = $sheet->GetLastRowIndex();
    $lastRow += 2;
    $cellRef = $ref($lastColIndex - 3, $lastRow);
    $sheet->Write($cellRef, "Done at Koudougou, ".getDate_En());

    // JURY'S MEMBERS
    $lastRow = $sheet->GetLastRowIndex();
    $lastRow += 2;
    //row for the jury
    $juryRow = $lastRow;
    $juryMembersCol = STARTING_COL_ + 1;
    $cellRef = $ref($juryMembersCol, $juryRow);
    $sheet->Write( $cellRef, "Jury Members");
    $sheet->UnderlineText($cellRef);
    $sheet->SetCellsToBold($cellRef);
    //inserts the different members of the jury
    foreach ($juryMembers as $key => $value)
    {
        $sheet->Write($ref($juryMembersCol, $juryRow+1+$key), $value);
    }

    // PRESIDENT OF THE JURY
    $juryPresidentCol = $lastColIndex - 3;
    $cellRef = $ref($juryPresidentCol, $juryRow);
    $sheet->Write($cellRef, "Jury President");
    $sheet->UnderlineText($cellRef);
    $sheet->SetCellsToBold($cellRef);
    //name of the jury's president
    $cellRef = $ref($juryPresidentCol, $juryRow+3);
    $sheet->Write($cellRef, $juryPresident);
    $sheet->SetCellsToBold($cellRef);



    //  XLS FILE CREATION AND SAVING'S SECTION
    //encrypts the file
    //the password = filename + _ + current data in php according to the following format day-month-full year
    $sheet->EncryptSheet($fileFullName.'_'.date("d-m-Y"));
    //renames the sheet
    $sheet->RenameSheet($sheetName);
    //saves the file
    $sheet->Save($fileFullName . '.xlsx', true);
}

$msg = "After an in-depth check, are declared definitively admitted the students whose names follow by order of merit:";
$juryMembers = [
    "Nana Jeremie",
    "Sanou Lougoudoro",
    "Yanogo Yves Wengundi Patrick"
];
$file = fopen('data.json', 'r');
$data = json_decode(fread($file, filesize('data.json')), true);
Proclamation("2021-2022", "Normal", "Electrical Engineering", "L2S2", $msg, $data, $juryMembers, "Dr Kabore W. Rodrigue");