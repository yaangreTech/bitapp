<?php
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Helper\Html;
use PhpOffice\PhpSpreadsheet\IOFactory;


Class ExcelXport
{
    public $sheet = null;
    public $spreadsheet = null;
    function __construct()
    {
        $this->spreadsheet = new Spreadsheet();
        $this->sheet = $this->spreadsheet->getActiveSheet();
    }

    //*write html text
    function WriteHtml($cell, $content)
    {
        $html = new Html();
        try
        {
            $this->Write($cell, $html->toRichTextObject($content));
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    function WordWrap(String $range='', bool $wrap = true)
    {
        try
        {
            $this->sheet->getStyle($range)->getAlignment()->setWrapText($wrap);
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    //*sets the row height
    function SetRowHeight(int $rowNumber, float $height)
    {
        try
        {
            $this->sheet->getRowDimension($rowNumber)->setRowHeight($height, 'pt');
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    //*sets the column width
    function SetColumnWidth(String $column, float $width)
    {
        try
        {
            $this->sheet->getColumnDimension($column)->setWidth($width);
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    //*sets a cell to bold
    function SetCellsToBold(String $range)
    {
        try
        {
            $this->sheet->getStyle($range)->getFont()->setBold(true);
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    //*sets a cell in to italic
    function SetCellsToItalic(String $range)
    {
        try
        {
            $this->sheet->getStyle($range)->getFont()->setItalic(true);
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    //*changes the rotation of the text


    function Rotate(String $range, float $rotation)
    {
        try
        {
            $this->sheet->getStyle($range)->getAlignment()->setTextRotation($rotation);
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    //*sets the size of the text
    function SetFontSize(String $range, int $size)
    {
        try
        {
            $this->sheet->getStyle($range)->getFont()->setSize($size);
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    //* merges a range of cell

    /**
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     */
    function MergeCells(String $range)
    {
        try
        {
            $this->sheet->mergeCells($range);
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    //*sets the borders to a range of cells
    function SetBorders(String $range, $type = 'allBorders', $borderStyle = 'BORDER_THIN')
    {
        $style = [
            'borders' => [
                $type => [
                    'borderStyle' => $borderStyle == 'BORDER_THIN' ? Border::BORDER_THIN : Border::BORDER_MEDIUM
                ]
            ]
        ];

        if($borderStyle == 'BORDER_DOTTED')
        {
            $style['borders'][$type]['borderStyle'] = BORDER::BORDER_DOTTED;
        }
        elseif ($borderStyle == "BORDER_DOUBLE")
        {
            $style['borders'][$type]['borderStyle'] = BORDER::BORDER_DOUBLE;
        }


        try
        {
            $this->sheet->getStyle($range)->applyFromArray($style);
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    function SetAlignment(String $range, String $vertically = 'bottom', String $horizontally = "left")
    {
        $alignment = ['alignment' => []];
        //for vertical alignment
        switch ($vertically)
        {
            case 'top':
                $alignment['alignment']['vertical'] = Alignment::VERTICAL_TOP;
                break;
            case 'center':
                $alignment['alignment']['vertical'] = Alignment::VERTICAL_CENTER;
                break;
            default:
                $alignment['alignment']['vertical'] = Alignment::VERTICAL_BOTTOM;
        }
        //for horizontal alignment
        switch ($horizontally)
        {
            case 'right':
                $alignment['alignment']['horizontal'] = Alignment::HORIZONTAL_RIGHT;
                break;
            case 'center':
                $alignment['alignment']['horizontal'] = Alignment::HORIZONTAL_CENTER;
                break;
            default:
                $alignment['alignment']['horizontal'] = Alignment::HORIZONTAL_LEFT;
        }

        try
        {
            $this->sheet->getStyle($range)->applyFromArray($alignment);
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }

    }

    //*changes the alignment to center
    function SetCenter(String $range, bool $vertically = false, bool $horizontally = false)
    {
        try
        {
            if($vertically)
            {
                $vertically = 'center';
            }

            if($horizontally)
            {
                $horizontally = 'center';
            }

            $this->SetAlignment($range, $vertically, $horizontally);
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }
    //*writes into a cell
    function Write(String $cell, $data)
    {
        try
        {
            $this->sheet->setCellValue($cell, $data);
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    //*creates an excel file
    function Save(String $fileName, $download = false)
    {
        $writer = new Xlsx($this->spreadsheet);
        try
        {
            if($download)
            {
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment; filename="'. $fileName.'"');
                $writer->save('php://output');
            }
            else
            {
                $writer->save($fileName);
            }
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }

    }

    //*sets the color to a range of cells
    function SetColor(String $range, String $hexa)
    {
        try
        {
            $this->sheet->getStyle($range)->getFill()
                ->setFillType(Fill::FILL_SOLID)
                ->getStartColor()->setARGB($hexa);
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    //*sets the color of the text
    function SetTextColor(String $range, String $hexa)
    {
        try
        {
            $styleArray = [
                'font'=>
                    [
                        'color' => array('rgb' => $hexa)
                    ]
            ];
            $this->sheet->getStyle($range)->applyFromArray($styleArray);
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    //*returns the number of the last row
    function GetLastRowIndex()
    {
        try
        {
            return $this->sheet->getHighestRow();
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    //*returns the number of the last row
    function GetLastColIndex()
    {
        try
        {
            return $this->sheet->getHighestColumn();
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    //*adds image to a cell
    function SetImage(String $cell, String $path, String $image_name, $image_size = [], float $offsetX = 0,  float $offsetY = 0, float $direction = 0, float $rotation = 0, bool $visibleShadow = false)
    {
        $fullPath = $path.DIRECTORY_SEPARATOR.$image_name;
        $drawing = new Drawing();
        $drawing->setName($fullPath);
        $drawing->setDescription('');
        // put your path and image here
        $drawing->setPath($fullPath);
        $drawing->setCoordinates($cell);
        $drawing->setOffsetX($offsetX);
        $drawing->setOffsetY($offsetY);
        $drawing->setRotation($rotation);
        $drawing->getShadow()->setVisible($visibleShadow);
        $drawing->getShadow()->setDirection($direction);
        //
        try
        {
            if(!empty($image_size))
            {
                $drawing->setWidthAndHeight($image_size[0], $image_size[1]);
            }
            $drawing->setWorksheet($this->sheet);
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    //*get the index of a column according to a cell value
    function GetColumnIndex(int $row, int $lastColIndex, String $cellValue, $caseInsenzitive = true)
    {
        if($caseInsenzitive)
        {

        }
        try
        {
            //row starts at 1 and column at 1, if cols starts at 0, it will retrieve the last col
            $index = 0;
            for($i = 1; $i < $lastColIndex; $i++)
            {
                $cellValue_ = $this->GetCellValue($i, $row);
                $cellValue_ = $caseInsenzitive ? strtoupper($cellValue_) :$cellValue_;
                $cellValue = $caseInsenzitive ? strtoupper($cellValue) :$cellValue;
                if($cellValue_ == $cellValue)
                {
                    $index = $i;
                    break;
                }
            }
            return $index - 1;
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    //*gets the cell value
    function GetCellValue(int $col, int $row)
    {
        try
        {
            return $this->sheet->getCellByColumnAndRow($col, $row)->getValue();
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    //*gets value from a range of cells
    function GetRangeValues($range)
    {
        try
        {
            return $this->sheet->rangeToArray($range, "");
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    //*freeze pane
    function FreezePane($col, $row)
    {
        try
        {
            $this->sheet->freezePaneByColumnAndRow($col, $row);
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    //*sets the name of the sheet
    function RenameSheet(String $name)
    {
        try
        {
            $this->sheet->setTitle($name);
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    //*sets a column size to auto
    function SetColumnWidthAuto($col)
    {
        try
        {
            $this->sheet->getColumnDimension($col)->setAutoSize(true);
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    //*sets a range of column width to auto
    function AutoSize($colRange)
    {
        try
        {
            for($i = 0; $i < count($colRange); $i++)
            {
                $this->SetColumnWidthAuto($colRange[$i]);
            }
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    //*gets the instance
    function GetInstance()
    {
        die(get_class($this->spreadsheet->addSheet($this->sheet)));
        try
        {
            $this->spreadsheet->addSheet($this->sheet);
            //return new $this->spreadsheet->addSheet();
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    //*function to set printable area
    function SetPrintingArea(String $range)
    {
        try
        {
            $this->sheet->getPageSetup()->setPrintArea($range);
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    //*function to set all sheet content to string
    function SetAllContentToString()
    {
        $highestRow = $this->GetLastRowIndex();
        $highestCol = $this->GetLastColIndex();
        for($row = 1; $row <= $highestRow; $row++)
        {
            for($col = 1; $col <= $highestCol; $col++)
            {
                $cell = $this->sheet->getCellByColumnAndRow($col, $row);
                $value = $cell->getValue();
                var_export($value);
                $cell->setValueExplicit($value, is_string($value)? DataType::TYPE_STRING: DataType::TYPE_NUMERIC);
            }
        }
    }

    //*function to encrypt the sheet
    function EncryptSheet($password)
    {
        //dd($this->sheet->getProtection());
        $this->sheet->getProtection()->setPassword($password);
        $this->sheet->getProtection()->setSheet(true);
        $this->sheet->getProtection()->setSort(true);
        $this->sheet->getProtection()->setInsertRows(true);
        $this->sheet->getProtection()->setFormatCells(true);
    }

    //*function to underline text
    function UnderlineText($range): void
    {
        try
        {
            $this->sheet->getStyle($range)->getFont()->setUnderline(true);
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    //* function to indent the content of a cell
    function Indent($range, $indent = 1):void
    {
        try
        {
            $this->sheet->getStyle($range)->getAlignment()->setIndent($indent);
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    //*function to create a new spreadsheet
    function CreateSpreadsheet(): void
    {
        try
        {
            $this->spreadsheet->createSheet();
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    //*function to change the index of the sheet
    function SetSheetIndex(int $index): void
    {
        try
        {
            $this->spreadsheet->setActiveSheetIndex($index);
        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    //*function to copy the content of a sheet in to a spreadsheet
    function CopySheet($spreadsheet, int $index)
    {
        try
        {

            $this->spreadsheet->addSheet($spreadsheet, $index);

        }
        catch (Exception $e)
        {
            $this->GetExceptionMessage($e);
        }
    }

    private function GetExceptionMessage($errors)
    {
        $err_message = $errors->getMessage();

        //gets the trace=>all files and linked function detaails about exception
        $err_trace = $errors->getTrace();
        //checks weither $err_trace is an array and not empty
        if (is_array($err_trace) AND !empty($err_trace))
        {
            //dd(in_array("file", array_keys($err_trace[0])) ? $err_trace[0]['file'] : "not set");
            $origins = in_array("file", array_keys($err_trace[0])) ? $err_trace[0]['file'] : "not set";
            $line = in_array("line", array_keys($err_trace[0])) ? $err_trace[0]['line'] : "not set";
            //dd(array_keys($err_trace[0]));
            //adds the origin file where the errors occurs
            $err_message .= ' origins from : '. $origins ;
            $err_message .= PHP_EOL;
            //adds the origin line of the file where the errors occurs
            $err_message .= ' on line : '.$line.PHP_EOL;
            //adds the origin function causing the errors
            $err_message .= ' by function : `'.$err_trace[1]['function'].'`'.PHP_EOL;
            //adds the line of the file where the function is called
            $err_message .= ' called at line : '.$err_trace[1]['line'].PHP_EOL;
            //adds the  of the file where the function is called
            $err_message .= ' in the file : '.$err_trace[1]['file'].PHP_EOL;
        }

        //adds the current date
        $err_message .= " at ".date('m/d/Y h:i:s').PHP_EOL;
        //recording errors for improving
        $exeception_err_log = fopen(__DIR__.DIRECTORY_SEPARATOR.'exeception_err_log.txt', 'a+');
        //breaklines
        $err_message = $err_message.PHP_EOL;
        //append the error at the end of the file
        fwrite($exeception_err_log, $err_message);
        //closes the file
        fclose($exeception_err_log);
    }
}

