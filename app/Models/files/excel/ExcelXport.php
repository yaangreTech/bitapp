<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
// use PhpOffice\PhpSpreadsheet\Cell\DataType;
// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Style\Alignment;
// use PhpOffice\PhpSpreadsheet\Style\Fill;
// use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
// use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// use PhpOffice\PhpSpreadsheet\Style\Border;
// use PhpOffice\PhpSpreadsheet\Helper\Html;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

// class ExcelXport extends Model
// {
//     use HasFactory;
//     public $sheet = null;
//     public $spreadsheet = null;
//     function __construct()
//     {
//         $this->spreadsheet = new Spreadsheet();
//         $this->sheet = $this->spreadsheet->getActiveSheet();
//     }

//     //*write html text
//     function WriteHtml($cell, $content): void
//     {
//         $html = new Html();
//         $this->Write($cell, $html->toRichTextObject($content));
//     }

//     function WordWrap(String $range='', bool $wrap = true): void
//     {
//         $this->sheet->getStyle($range)->getAlignment()->setWrapText($wrap);
//     }

//     //*sets the row height
//     function SetRowHeight(int $rowNumber, float $height): void
//     {
//         $this->sheet->getRowDimension($rowNumber)->setRowHeight($height, 'pt');
//     }

//     //*sets the column width
//     function SetColumnWidth(String $column, float $width): void
//     {
//         $this->sheet->getColumnDimension($column)->setWidth($width);
//     }

//     //*sets a cell to bold
//     function SetCellsToBold(String $range): void
//     {
//         $this->sheet->getStyle($range)->getFont()->setBold(true);
//     }

//     //*sets a cell in to italic
//     function SetCellsToItalic(String $range): void
//     {
//         $this->sheet->getStyle($range)->getFont()->setItalic(true);
//     }

//     //*changes the rotation of the text

//     /**
//      * @throws \PhpOffice\PhpSpreadsheet\Exception
//      */
//     function Rotate(String $range, float $rotation): void
//     {
//         $this->sheet->getStyle($range)->getAlignment()->setTextRotation($rotation);
//     }

//     //*sets the size of the text
//     function SetFontSize(String $range, int $size): void
//     {
//         $this->sheet->getStyle($range)->getFont()->setSize($size);
//     }

//     //* merges a range of cell

//     /**
//      * @throws \PhpOffice\PhpSpreadsheet\Exception
//      */
//     function MergeCells(String $range): void
//     {
//         $this->sheet->mergeCells($range);
//     }

//     //*sets the borders to a range of cells
//     function SetBorders(String $range, $type = 'allBorders', $borderStyle = 'BORDER_THIN'): void
//     {
//         $style = [
//             'borders' => [
//                 $type => [
//                     'borderStyle' => $borderStyle == 'BORDER_THIN' ? Border::BORDER_THIN : Border::BORDER_MEDIUM
//                 ]
//             ]
//         ];

//         if($borderStyle == 'BORDER_DOTTED')
//         {
//             $style['borders'][$type]['borderStyle'] = BORDER::BORDER_DOTTED;
//         }
    
//         $this->sheet->getStyle($range)->applyFromArray($style);
//     }

//     function SetAlignment(String $range, String $vertically = 'bottom', String $horizontally = "left"): void
//     {
//         $alignment = ['alignment' => []];
//         //for vertical alignment
//         switch ($vertically)
//         {
//             case 'top':
//                 $alignment['alignment']['vertical'] = Alignment::VERTICAL_TOP;
//                 break;
//             case 'center':
//                 $alignment['alignment']['vertical'] = Alignment::VERTICAL_CENTER;
//                 break;
//             default:
//                 $alignment['alignment']['vertical'] = Alignment::VERTICAL_BOTTOM;
//         }
//         //for horizontal alignment
//         switch ($horizontally)
//         {
//             case 'right':
//                 $alignment['alignment']['horizontal'] = Alignment::HORIZONTAL_RIGHT;
//                 break;
//             case 'center':
//                 $alignment['alignment']['horizontal'] = Alignment::HORIZONTAL_CENTER;
//                 break;
//             default:
//                 $alignment['alignment']['horizontal'] = Alignment::HORIZONTAL_LEFT;
//         }

//         $this->sheet->getStyle($range)->applyFromArray($alignment);

//     }

//     //*changes the alignment to center
//     function SetCenter(String $range, bool $vertically = false, bool $horizontally = false): void
//     {

//         if($vertically)
//         {
//             $vertically = 'center';
//         }

//         if($horizontally)
//         {
//             $horizontally = 'center';
//         }

//         $this->SetAlignment($range, $vertically, $horizontally);
//     }
//     //*writes into a cell
//     function Write(String $cell, $data): void
//     {
//         $this->sheet->setCellValue($cell, $data);
//     }

//     //*creates an excel file
//     function Save(String $fileName, $download = false): void
//     {
//         $writer = new Xlsx($this->spreadsheet);
//         if($download)
//         {    
//             header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//             header('Content-Disposition: attachment; filename="'. urlencode($fileName).'"');
//             $writer->save('php://output');
//         }
//         else
//         {
//             $writer->save($fileName);
//         }
//     }

//     //*sets the color to a range of cells
//     function SetColor(String $range, String $hexa): void
//     {
//         $this->sheet->getStyle($range)->getFill()
//             ->setFillType(Fill::FILL_SOLID)
//             ->getStartColor()->setARGB($hexa);
//     }

//     //*sets the color of the text
//     function SetTextColor(String $range, String $hexa): void
//     {
//         $styleArray = [
//             'font'=>
//             [
//                 'color' => array('rgb' => $hexa)
//             ]
//         ];
//         $this->sheet->getStyle($range)->applyFromArray($styleArray);
//     }

//     //*returns the number of the last row
//     function GetLastRowIndex(): int
//     {
//         return $this->sheet->getHighestRow();
//     }

//     //*adds image to a cell
//     function SetImage(String $cell, String $path, String $image_name, $image_size = [], float $offsetX = 0,  float $offsetY = 0, float $direction = 0, float $rotation = 0, bool $visibleShadow = false): void
//     {
//         $fullPath = $path.DIRECTORY_SEPARATOR.$image_name;
//         $drawing = new Drawing();
//         $drawing->setName($fullPath);
//         $drawing->setDescription('');
//         // put your path and image here
//         $drawing->setPath($fullPath);
//         $drawing->setCoordinates($cell);
//         $drawing->setOffsetX($offsetX);
//         $drawing->setOffsetY($offsetY);
//         $drawing->setRotation($rotation);
//         $drawing->getShadow()->setVisible($visibleShadow);
//         $drawing->getShadow()->setDirection($direction);
//         //
//         if(!empty($image_size))
//         {    
//             $drawing->setWidthAndHeight($image_size[0], $image_size[1]); 
//         }
//         $drawing->setWorksheet($this->sheet);
//     }

//     //*get the index of a column according to a cell value
//     function GetColumnIndex(int $row, int $lastColIndex, String $cellValue): int
//     {
//         //row starts at 1 and column at 1, if cols starts at 0, it will retrieve the last col
//         $index = 0;
//         for($i = 1; $i < $lastColIndex; $i++)
//         {
//             if($this->GetCellValue($i, $row) == $cellValue)
//             {
//                 $index = $i;
//                 break;
//             }
//         }
//         return $index - 1;
//     }

//     //*gets the cell value
//     function GetCellValue(int $col, int $row): mixed
//     {
//         return $this->sheet->getCellByColumnAndRow($col, $row)->getValue();
//     }

//     //*gets value from a range of cells
//     function GetRangeValues($range): array
//     {
//         return $this->sheet->rangeToArray($range, "");
//     }

//     //*freeze pane
//     function FreezePane($col, $row): void
//     {
//         $this->sheet->freezePaneByColumnAndRow($col, $row);
//     }

//     //*sets the name of the sheet
//     function RenameSheet(String $name): void
//     {
//         $this->sheet->setTitle($name);
//     }

//     //*sets a column size to auto
//     function SetColumnWidthAuto($col): void
//     {
//         $this->sheet->getColumnDimension($col)->setAutoSize(true);
//     }

//     //*sets a range of column width to auto
//     function AutoSize($colRange): void
//     {
//         for($i = 0; $i < count($colRange); $i++)
//         {
//             $this->SetColumnWidthAuto($colRange[$i]);
//         }
//     }

//     //*gets the instance
//     function GetInstance(): ?Worksheet
//     {
//         return $this->spreadsheet;
//     }

//     //*function to set printable area
//     function SetPrintingArea(String $range)
//     {
//         $this->sheet->getPageSetup()->setPrintArea($range);
//     }
// }
