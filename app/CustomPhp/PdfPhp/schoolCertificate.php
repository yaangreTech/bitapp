<?php

use Elibyy\TCPDF\Facades\TCPDF;

require_once(app_path('CustomPhp/customHelpers.php'));

function SchoolCertificate(String $director_full_name, String $student_full_name, int $class, String $department, String $option, $school_year, String $id, String $saveInFolder = '')
{
    //////////////////////////////// Params
    $logoPath = app_path('CustomPhp/PdfPhp/logo2.png');
    $date = getDate_Fr();
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
    $pdf::SetCreator("ytech-bf.com");
    $pdf::SetAuthor('Burkina Instute of Technology');
    $pdf::SetTitle('Certificat de scolarite');
    $pdf::SetSubject('Certificat de scolarite');
    $pdf::SetKeywords('');


    $pdf::SetFooterMargin(0);

    //margins left, top, right, bottom
    $pdf::SetMargins(2, 10, 2, 0);

    // removes the horizontal rules in the header and the footer
    $pdf::SetPrintHeader(false);
    $pdf::SetPrintFooter(false);

    // set auto page breaks
    $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
        require_once(dirname(__FILE__) . '/lang/eng.php');
        $pdf::setLanguageArray($l);
    }


    // Set font to times
    $pdf::SetFont('times', '', 16, '', true);


    //sets the height of a line
    $pdf::setCellHeightRatio(1.5);
    // removes the horizontal rules in the header and the footer
    $pdf::SetPrintHeader(false);
    $pdf::SetPrintFooter(false);

    // Add a page
    $pdf::AddPage();

    // ---------------------------------------------------------

    /**sets the content text */
    $content = <<<HTML
        <div style="font-family: 'Times New Roman'">
            <table style="padding: 2px">
                <tr>
                    <td style="width: 50%;">
                        <img src="{$logoPath}" width="200">
                    </td>
                    <td style=" font-size: 15px;width: 50%; text-align: center; padding-top: 0px">
                        Burkina-Faso<br>Unité-Progès-Justice
                    </td>
                </tr>
                <tr>
                    <td style="font-style: italic; font-size: 10px; flex: 100%;">
                    ‘’Educating a New Generation of Leaders’’
                    </td>
                </tr>
            </table>
            <h3 style="text-align: center; text-decoration: underline;font-family: Colibri;">CERTIFICAT D'INSCRIPTION</h3>
            <table>
                <tr>
                    <td style="width: 3%"></td>
                    <td style="width: 94%; font-size: 12px; text-align: left;text-indent: -5px">

                            Je soussigne, {$director_full_name}, Directeur Général de Burkina
                            Institute of Technology (BIT), atteste que l’étudiante <b>{$student_full_name}</b> est régulièrement inscrite à BIT en {$classes[$class]} de <i>{$department}</i>, option <i>Programmation</i> pour l’année académique 2020-2021 sous
                            le numéro matricule : <b>{$id}</b>.
                            <div style="text-indent: 8px">
                            En foi de quoi ce présent certificat lui est délivré pour servir et valoir
                            ce que de droit.
                            </div>



                        <p style="text-align: right;">
                            Koudougou, le {$date}
                        </p>
                    </td>
                    <td style="width: 3%"></td>
                </tr>
            </table>

            <table>
                <tr>
                    <td style="text-align: right; width: 75%; font-size: 12px;">
                        <br>
                        <br>
                        L’Administration
                    </td>
                    <td style="width: 25%"></td>
                </tr>
            </table>

        </div>
        HTML;

    // Print text using writeHTMLCell()
    $pdf::writeHTMLCell(0, 0, '', '', $content, 0, 1, 0, true, 'J', true);
    $pdf::writeHTMLCell(0, 0, '', '-140', $content, 0, 1, 0, true, 'J', true);

    //gets the height of the pdf
    $height = $pdf::getY();
    //gets the width of the pdf
    $width = $pdf::getPageWidth();


    $style = array('width' => 0.5, 'dash' => '2,2,2,2', 'phase' => 0, 'color' => array(0, 0, 0));

    $pdf::Line(0, ($height / 2) + 5, $width, ($height / 2) + 5, $style);

    // ---------------------------------------------------------


    //must be downloaded directly or not
    if ($download) {
        // Close and output PDF document
        $pdf::Output('certificat_de_scolarite_' . $student_full_name . '_' . $date . '.pdf', 'I');
    } else {
        $pdf::Output($saveInFolder . DIRECTORY_SEPARATOR . 'certificat_de_scolarite_' . $student_full_name . '_' . $date . '.pdf', 'F');
    }

    //============================================================+
    // END OF FILE
    //============================================================+
}