<?php

use Elibyy\TCPDF\Facades\TCPDF;

require_once(app_path('CustomPhp/customHelpers.php'));

const PDF_UNITs = PDF_UNIT;
const PDF_PAGE_FORMATs = PDF_PAGE_FORMAT;

function pdfFile(
    $lang = "en",
    $director_full_name = "Dr. W. Rodrigue KABORE",
    $studen_full_name = "Dr. W. Rodrigue KABORE",
    $isMan = true,
    $order_number = '0001',
    $student_id = 'bs00001',
    $academic_year = "2020-2021",
    $department,
    $option
) {
    $prefName_en = $isMan ? "Mr" : "Mrs";
    $prefName_fr = $isMan ? "M" : "Mlle";
    $saveInFolder = /*public_path()*/ '';
    //checks whether the file must be downloaded or kept in one folder
    $download = empty($saveInFolder);
    //sets the path of the logo
    $logoPath = app_path('CustomPhp/PdfPhp/logo2.png');
    //imports extra fonts
    $fonts = addFonts();
    extract($fonts);

    $date_fr = getDate_Fr();
    $date_en = date('F d, Y');

    $ministry = $lang == "en" ? "Ministry of Higher Education, Scientific Research and Innovation" : "Ministère de l'Enseignement Supérieur, de la Recherche Scientifique et de l'Innovation";

    /** Configurations */
    // create new PDF document
    $pdf = new TCPDF("L", PDF_UNITs, PDF_PAGE_FORMAT, true, 'UTF-8', false);


    // set document information
    $pdf::SetCreator("ytech-bf.com");
    $pdf::SetAuthor('Burkina Instute of Technology');
    $pdf::SetTitle('Diplome');
    $pdf::SetSubject('Diplome');
    $pdf::SetKeywords('');
    $pdf::SetFooterMargin(0);

    //margins left, top, right, bottom
    $pdf::SetMargins(10, 6, 10, 0);

    // removes the bottom margin
    $pdf::SetAutoPageBreak(TRUE, -90);
    $pdf::AddPage("L");

    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
        require_once(dirname(__FILE__) . '/lang/eng.php');
        $pdf::setLanguageArray($l);
    }
    // add fonts
    $arial_rounded_b = app_path('CustomPhp/PdfPhp/fonts/arial_rounded_bold.ttf');
    $helvetica_b = app_path('CustomPhp/PdfPhp/fonts/helvetica_neue.ttf');

    $arial_rounded_bold = TCPDF_FONTS::addTTFfont($arial_rounded_b, 'TrueTypeUnicode', '', 96);
    $helvetica = TCPDF_FONTS::addTTFfont($helvetica_b, 'TrueTypeUnicode', '', 96);

    //height of the page
    $height = $pdf::getPageHeight();
    //width of the page
    $width = $pdf::getPageWidth();


    //sets the height of a line
    $pdf::setCellHeightRatio(1);
    // removes the horizontal rules in the header and the footer
    $pdf::SetPrintHeader(false);
    $pdf::SetPrintFooter(false);


    //content in English
    $content_eng = <<<HTML
        <h4 style="text-align: center;font-weight: bold; font-size: 14px; font-family:{$arial_rounded_bold};" class="line_spacement">BACHELOR'S DEGREE</h4>
        <p style="font-style: italic; font-size: 10px;" class="line_spacement">
            Considering Law N ° 013-2007 / AN of July 30, 2007 on the orientation law of education;<br>
            Considering the order n ° 2019-073 / MESRSI / SG / DGESup of February 25, 2019 on the general regime of studies for a Bachelor degree in public and
            private higher education and research institutions,<br>
            Considering Order No. 2019/25 /MESRSI /SG /DGESup of May 17, 2019 authorizing the opening of Burkina Institute of Technology,<br>
            Having regard to the study regime at Burkina Institute of Technology (BIT) of October 19, 2019,<br>
            Having regard to the minutes of the jury attesting that the person concerned has passed the test of knowledge and skills provided for by the regulatory texts
        </p>
        <p style="font-size: 12px;" class="line_spacement">
            The Bachelor’s degree on SCIENCES AND TECHNOLOGIES, Mention: {$department}, Speciality: {$option}<br><br>
            is awarded to <b style="font-size: 14px;">{$prefName_en}. </b> {$studen_full_name}<br>
            to whom is conferred the rank of <b>BACHELOR OF SCIENCES (B.Sc) - {$option}</b><br>
            for the academic year {$academic_year}<br>
            to enjoy it with the rights and prerogatives attached to it.<br><br>
            Done at Koudougou, {$date_en}.
        </p>
        <table>
            <tr style="font-family: calibri;text-size: 12px;">
                <td style="text-align: center">The impetrant</td>
                <td style="text-align: center">
                    The Founder
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <b><u>Susanne PERTL</u></b>
                </td>
                <td style="text-align: center;">
                    The Dean
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <b><u>{$director_full_name}</u></b>
                </td>
            </tr>
        </table>
        <br>
        <p style="font-size: 9px; font-family: calibri; font-style: italic">N°{$order_number}BIT-ID{$student_id}</p>
    HTML;

    //content in French
    $content_fr = <<<HTML
        <h4 style="text-align: center;font-weight: bold; font-size: 14px; font-family:{$arial_rounded_bold}">DIPLÔME DE LICENCE</h4>
        <p style="font-style: italic; font-size: 10px;" class="line_spacement">
            Vu la loi N°013-2007/AN du 30 juillet 2007 portant loi d’orientation de l’éducation ;<br>
            Vu l’arrêté n°2019-073/MESRSI/SG/DGESup du 25 février 2019 portant régime général des études de diplôme de Licence dans les institutions publiques et privées d’enseignement supérieur et de recherche ;<br>
            Vu l’arrêté N° 2019/25/ESRSI/SG/DGESup du 17 Mai 2019 portant autorisation d’ouverture de Burkina Institute of Technology ;<br>
            Vu le régime des études à Burkina Institute of Technology (BIT) du 19 octobre 2019 ;<br>
            Vu les procès-verbaux du jury attestant que l’intéressé a satisfait au contrôle de connaissances et des aptitudes prévu par les textes réglementaires ;
        </p>
        <p style="font-size: 12px;" class="line_spacement">
            Le diplôme de LICENCE en SCIENCES ET TECHNOLOGIES, Mention : {$department}, Spécialité : {$option}<br><br>
            est décerné à <b style="font-size: 14px;">{$prefName_fr}. </b>{$studen_full_name}<br>
            à qui est conféré le <b>grade de LICENCE SCIENCES POUR L’INGÉNIEUR - {$option}</b><br>
            au titre de l’année universitaire {$academic_year}<br>
            pour en jouir avec les droits et prérogatives qui y sont attachés.<br><br>
            Fait à Koudougou le {$date_en}.
        </p>
        <table>
            <tr style="font-family: calibri;text-size: 12px;">
                <td style="text-align: center">Le titulaire</td>
                <td style="text-align: center">
                    La Fondatrice
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <b><u>Susanne PERTL</u></b>
                </td>
                <td style="text-align: center;">
                    Le Directeur Général
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <b><u>{$director_full_name}</u></b>
                </td>
            </tr>
        </table>
        <br>
        <p style="font-size: 9px; font-family: calibri; font-style: italic">N°{$order_number}BIT-ID{$student_id}</p>
    HTML;

    //chooses content according to the language
    $content = $lang == "en" ? $content_eng : $content_fr;

    // Add a page : orientation landscape


    $content = <<<HTML
        <style>
            body{
                font-family: {$helvetica};
                font-size: 11px;
            }
            p{
                text-indent: -5px;
            }
            ul{
                text-indent: 25px
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
            <p style="font-weight: bold; text-align: center; font-size: 12px;" class="spacement">
                BURKINA FASO
                <br>
                Unité – Progrès – Justice
                <br><br>
                {$ministry}
                <br><br>
                <!--sizes will be changed accoding to the new logo added-->
                <img src="{$logoPath}" height="40.7" width="200.02"/>
            </p>
            <table>
                <tr>
                    <td style="width: 5%"></td>
                    <td style="width: 90%;">{$content}</td>
                    <td style="width: 4%"></td>
                </tr>
            </table>
        </body>
    HTML;

    //blue line configuration
    $pdf::SetLineStyle(array('width' => 0.8, 'cap' => 'butt', 'join' => 'miter', 'solid' => 4, 'color' => array(68, 114, 196)));
    //adds rectangle line
    $pdf::Rect(8.5, 8, $width - 16, $height - 17);
    //scarla line configuration
    $pdf::SetLineStyle(array('width' => 0.8, 'cap' => 'butt', 'join' => 'miter', 'solid' => 4, 'color' => array(205, 49, 103)));
    //adds rectangle line
    $pdf::Rect(12, 12, $width - 24, $height - 24);



    // Print text using writeHTMLCell()
    $pdf::writeHTMLCell(0, 0, '', '', $content, 0, 1, 0, true, 'L', true);

    //sets transparency of the watermark image
    $pdf::SetAlpha(0.1);


    $pdf::Image($logoPath, 90, 85, 1000, 180);


    // ---------------------------------------------------------

    //must be downloaded directly or not
    if ($download) {
        // Close and output PDF document
        $pdf::Output('diploma_' . $lang . '_' . $student_id . '.pdf', 'I');
        // return response()->download(public_path($filename));
    } else {
        $pdf::Output($saveInFolder . DIRECTORY_SEPARATOR . 'diploma_' . $lang . '_' . $student_id . ' ' . $lang . '.pdf', 'F');
    }
}