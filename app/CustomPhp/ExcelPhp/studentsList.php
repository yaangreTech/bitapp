<?php
    // require('excel.php');
    use App\CustomPhp\ExcelPhp\ExcelXport;
    // require("../functions.php");

    /**
     * @param array $data the list of student information
     * @param string $class the name of the class
     * @param string $academicYear the academic year
     * @param string $saveInFolder the folder in which the file must be save (must be ended up by a directory delimiter). If it is not specified, the file will be directly download
     * @return void
     */
    function StudentsList($data = [], $class = "", $academicYear = "", $saveInFolder = ''): void
    {
        $download = empty($saveInFolder);
        //new Excel object
        $sheet = new ExcelXport();

        //list of alphabet characters
        $alphabet = Alphabet();

        $fileName = $class." ".$academicYear;

        // start column
        define("START_COL", 1);
        //starting row for writing data
        define('STARTING_ROW', 1);
        //colors
        define('BEIGE', 'ffeeece1');

        //gets the headers data
        $headers = array_keys(max($data));

        $finalColIndex = START_COL + count($headers) - 1;
        $finalCol = $alphabet[$finalColIndex-1];

        //writes headers
        for($col = 0;$col<count($headers); $col++)
        {
            $sheet->Write($alphabet[START_COL+$col-1].(STARTING_ROW), $headers[$col]);
        }
        //formats headers
        $sheet->SetColor($alphabet[START_COL-1].(STARTING_ROW).":".$finalCol.(STARTING_ROW), BEIGE);
        //set to bold
        $sheet->SetCellsToBold($alphabet[START_COL-1].(STARTING_ROW).":".$finalCol.(STARTING_ROW));
        $lastRow = $sheet->GetLastRowIndex();
        for($i = 0; $i < count($data); $i++)
        {
            $values = $data[$i];
            for($col = 0;$col<count($headers); $col++)
            {
                $sheet->Write($alphabet[START_COL+$col-1].(STARTING_ROW+$i+$lastRow), $values[$headers[$col]]);
            }
        }

        $sheet->SetBorders($alphabet[START_COL-1].(STARTING_ROW).":".$finalCol.$sheet->GetLastRowIndex());

        //wordwrap all the file cells
        $sheet->WordWrap("A1:".$finalCol.$sheet->GetLastRowIndex());

        //sets columns width to auto
        $sheet->AutoSize($alphabet);

        $sheet->save($saveInFolder.$fileName.".xlsx", $download);
    }
?>