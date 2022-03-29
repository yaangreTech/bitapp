<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

$executingScriptFolderName = dirname($_SERVER['SCRIPT_FILENAME']);
//name of the current folder
$currentFolderName = dirname(__FILE__);
define("TCPDF_IMAGE_PATH", GetRelativePath($executingScriptFolderName, $currentFolderName)."logo.png");

//finds the name of the image path for the html imag tag
$currentFolderName = dirname(ReplacePathSeparator(__FILE__));
$contextPath = ReplacePathSeparator($_SERVER['CONTEXT_DOCUMENT_ROOT']);
$HTML_IMAGE_PATH =  str_replace($contextPath, "", $currentFolderName).DIRECTORY_SEPARATOR;
define('HTML_IMAGE_PATH', str_replace(DIRECTORY_SEPARATOR, "/", $HTML_IMAGE_PATH)."logo.png");


class SchoolCertificate extends Model
{
    use HasFactory;

    
    /**
     * @param String $director_full_name
     * @param String $student_full_name
     * @param int $class
     * @param String $department
     * @param String $option
     * @param $school_year
     * @param String $id
     * @return void
     */
   public function SchoolCertificate(String $director_full_name, String $student_full_name, int $class, String $department, String $option, $school_year, String $id, String $saveInFolder = ''): void
    {
        //////////////////////////////// Params
        $date = getDate_Fr();
        //sets the path of the logo
        $logoPath =  HTML_IMAGE_PATH;
        //imports extra fonts
        $fonts = addFonts();
        extract($fonts);
        $download = empty($saveInFolder);

        //list of classes
        $classes = [
            1 => "première année",
            2 => "deuxième année",
            3 => "troisième année"
        ];
        ///////////////////////////////

        /** Configurations */
        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR."_YaangreTech");
        $pdf->SetAuthor('Burkina Instute of Technology');
        $pdf->SetTitle('Certificat de scolarite');
        $pdf->SetSubject('Certificat de scolarite');
        $pdf->SetKeywords('');


        $pdf->SetFooterMargin(0);

        //margins left, top, right, bottom
        $pdf->SetMargins(2, 10, 2, 0);

        // removes the horizontal rules in the header and the footer
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }


        // Set font to times
        $pdf->SetFont('times', '', 16, '', true);


        //sets the height of a line
        $pdf->setCellHeightRatio(1.5);
        // removes the horizontal rules in the header and the footer
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);

        // Add a page
        $pdf->AddPage();

        // ---------------------------------------------------------

        /**sets the content text */
        $content = <<<HTML
        <div>
            <table style="padding: 2px">
                <tr>
                    <td style="width: 35%;">
                        <img src="{$logoPath}" width="200">
                    </td>
                    <td style="font-weight: bold; font-size: 8px;width: 65%;font-family: Calibri, 'Trebuchet MS', sans-serif; padding-top: 10px">
                        <!-- tag i and br for putting top padding-->
                        <i></i><br>Autorisation de création: N° 2018-00/01347/MESRSI/SG/DGESup/DIPES du 13 Septembre 2018<br>Autorisation d’ouverture: N° 2018-00001511/MESRSI/SG/DGESup/DIPES du 25 Septembre 2018
                    </td>
                </tr>
                <tr>
                    <td style="font-style: italic; font-size: 10px; flex: 100%;">
                        ‘’Educating a New Generation of Leaders’’
                    </td>
                    <td></td>
                </tr>
            </table>

            <!-- adds space-->
            <i></i>
            <br><br>

            <table>
                <tr>
                    <td style="width: 8%"></td>
                    <td style="width: 80%">
                        <h3 style="text-align: center; text-decoration: underline;">CERTIFICAT DE SCOLARITE</h3>

                        <p>
                            Je soussigne, {$director_full_name}, Directeur Général de Burkina 
                            Institute of Technology (BIT), atteste que l’étudiante <b>{$student_full_name}</b> est régulièrement inscrite à BIT en {$classes[$class]} de <i>{$department}</i>, option <i>Programmation</i> pour l’année académique 2020-2021 sous 
                            le numéro matricule : <b>{$id}</b>.
                            <br>
                            <br>
                            En foi de quoi ce présent certificat lui est délivré pour servir et valoir 
                            ce que de droit.
                        </p>
                        
                        <p style="text-align: right;">
                            Koudougou, le {$date}
                        </p>
                        <!-- adds space-->
                        

                        <p style="text-align: right;">
                        L’Administration &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                        </p>
                    </td>
                    <td style="width: 10%"></td>
                </tr>
            </table>
            <!-- adds space-->
            <i></i>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            
            <div style="font-size: 10px; font-family: Calibri; text-align: center;">
                Burkina Institute of Technology<br>
                BP : 322 Koudougou-BF, Tél : 53111110/ 67444229, Email : <u>info@bit.bf</u>
            </div>
        
        </div>
        HTML;

        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $content, 0, 1, 0, true, 'J', true);

        // ---------------------------------------------------------


        //must be downloaded directly or not
        if($download)
        {
            // Close and output PDF document
            $pdf->Output('certificat_de_scolarite_' . $student_full_name.'_'.$date . '.pdf', 'I');
        }
        else
        {
            $pdf->Output($saveInFolder.DIRECTORY_SEPARATOR.'certificat_de_scolarite_' . $student_full_name.'_'.$date . '.pdf', 'F');
        }

        //============================================================+
        // END OF FILE
        //============================================================+
    }
}
