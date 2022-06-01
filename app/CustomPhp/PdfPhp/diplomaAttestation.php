<?php

use Elibyy\TCPDF\Facades\TCPDF;

require_once(app_path('CustomPhp/customHelpers.php'));

function diplomaAttestation($student_name, $birth_date, $location, $id, $validation_date, $domain, $mention, $field, $cote, $generation_date, $dean = "Dr W. Rodrigue KABORE", $saveInFolder = ""): void
{
    //checks whether the file must be downloaded or kept in one folder
    $download = empty($saveInFolder);
    //sets the path of the logo
    $logoPath = app_path('CustomPhp/PdfPhp/logo.png');
    //imports extra fonts
    $fonts = addFonts();
    extract($fonts);

    /** Configurations */
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // set document information
    $pdf::SetCreator("ytech-bf.com");
    $pdf::SetAuthor('Burkina Instute of Technology');
    $pdf::SetTitle('Attestation provisoire de diplome');
    $pdf::SetSubject('Attestation provisoire de diplome');
    $pdf::SetKeywords('');


    $pdf::SetFooterMargin(0);

    //margins left, top, right, bottom
    $pdf::SetMargins(12, -5, 12, 0);

    // removes the bottom margin
    $pdf::SetAutoPageBreak(TRUE, -90);

    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
        require_once(dirname(__FILE__) . '/lang/eng.php');
        $pdf::setLanguageArray($l);
    }


    //sets the height of a line
    $pdf::setCellHeightRatio(1.5);
    // removes the horizontal rules in the header and the footer
    $pdf::SetPrintHeader(false);
    $pdf::SetPrintFooter(false);

    // Add a page
    $pdf::AddPage();

    //content of the page
    $content = <<<HTML

            <style>
                body
                {
                    font-family: {$arial};
                    font-size: 11px;
                }
                p{
                    text-indent: -5px;
                }
                ul{
                    text-indent: 25px
                }
                b
                {
                    font-family: {$arial_bold}
                }
                .letter_spacement
                {
                    letter-spacing: -0.2px;
                }
                .line_spacement
                {
                    line-height: 13px;
                }
            </style>
            <body>
                <table>

                    <tr style="border: 1px solid black">
                        <td style="width: 45%;">
                            <p style="text-align: center; font-size: 12px; font-weight: bold;">
                                Ministère de l’Enseignement Supérieur,<br>
                                de la Recherche Scientifique et de<br>
                                l’Innovation<br>
                                ---------------
                            </p>
                        </td>
                        <td style="width: 15%;"></td>
                        <td style="width: 40%;">
                            <p style="text-align: center">
                                <span style="font-size: 14px; font-weight: bold">BURKINA FASO</span><br>
                                = = = =<br>
                                <span style="font-size: 8px; font-weight: bold">UNITÉ – PROGRÈS - JUSTICE</span>
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="width: 50%;">
                            &nbsp;
                            <img src="{$logoPath}" width="300"/>
                            <br>
                            &nbsp;
                            <span style="font-size: 9px;font-family:{$arial}">322 Koudougou, Burkina Faso // mail@bit.bf // www.bit.bf</span>
                        </td>
                    </tr>

                    <tr>
                        <td style="text-align: center; font-size: 28px; font-family: {$arial_rounded_bold}; width:100%">
                            <p class="line_spacement">ATTESTATION</p>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <p style="font-size: 13px">Le Directeur Général de Burkina Institute of Technology (BIT), soussigné atteste que :</p>
                            <p style="font-size: 18px; text-align: center;">$student_name</p>
                            <p style="font-size: 13px">Né(e) le : <span style="font-family: {$arial_bold}">{$birth_date} à {$location}</span> &nbsp;&nbsp; Matricule : <span style="font-family: {$arial_bold}">{$id}</span>
                                a validé en {$validation_date} les crédits pour l’obtention de la</p>
                            <p class="line_spacement" style="text-align: center; font-size: 22px; font-family: {$arial_rounded_bold};">LICENCE</p>
                        </td>
                    </tr>

                    <tr>
                        <td style="width:20%"></td>
                        <td style="width:50%; font-size: 13px">
                            <i></i><br>
                            <span>Domaine : <b>{$domain}</b></span><br>
                            <span>Mention : <b>{$mention}</b></span><br>
                            <span>Spécialité : <b>{$field}</b></span><br>
                            <span>Cote (Mention) : <b>{$cote}</b></span>
                        </td>
                        <td style="width:30%"></td>
                    </tr>

                    <tr>
                        <td style="width:100%">
                            <p style="font-size: 13px">
                                En foi de quoi, il lui est délivré la présente attestation pour servir et valeur ce que
                                de  droit
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="width:60%"></td>
                        <td style="width:40%;text-align:center;">
                            <span>Koudougou, le {$generation_date}</span><br>
                            <span>Le Directeur Général</span>
                        </td>
                    </tr>

                    <tr>
                        <td style="width:60%"></td>
                        <td style="width:40%;text-align:center; font-size: 15px; font-weight: bold">
                            <!--times new roman-->
                            {$pdf::SetFont('times', '', 16, '', true)}
                            <p style="text-decoration: underline;">{$dean}</p>
                        </td>
                    </tr>

                    <tr>
                        <td style="width:62%;">
                            <p style="border: 0.3px solid black; font-size: 10px">&nbsp;&nbsp;&nbsp;<u>NB</u>: <i>En cas de surcharge ou de rature, la présente attestation est nulle</i></p>
                        </td>
                    </tr>
                </table>
            </body>
        HTML;

    $pdf::writeHTMLCell(0, 0, '', '', $content, 0, 1, 0, true, 'L', true);

    //sets transparency of the watermark image
    $pdf::SetAlpha(0.14);


    $pdf::Image($logoPath, 150, 250, 300, 100, '', '', '', false, 300, '', false, false, 0, false, true, false);

    // ---------------------------------------------------------

    //must be downloaded directly or not
    if ($download) {
        // Close and output PDF document
        $pdf::Output('attestation_provisoire_' . $student_name . '.pdf', 'I');
    } else {
        $pdf::Output($saveInFolder . DIRECTORY_SEPARATOR . 'attestation_provisoire_' . $student_name . '.pdf', 'F');
    }
}