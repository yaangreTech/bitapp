<?php

use Elibyy\TCPDF\Facades\TCPDF;

require_once(app_path('CustomPhp/customHelpers.php'));

function InternshipCertificate($content, $name, $saveInFolder = ''): void
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
    $pdf::SetAuthor('Burkina Institute of Technology');
    $pdf::SetTitle('Attestation de stage');
    $pdf::SetSubject('Attestation de stage');
    $pdf::SetKeywords('');


    $pdf::SetFooterMargin(0);

    //margins left, top, right, bottom
    $pdf::SetMargins(10, 15, 10, 0);

    // removes the bottom margin
    $pdf::SetAutoPageBreak(TRUE, -90);


    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
        require_once(dirname(__FILE__) . '/lang/eng.php');
        $pdf::setLanguageArray($l);
    }
    //adds arial font
    $arial_n = app_path('CustomPhp/PdfPhp/fonts/ArialN.ttf');
    $arial_b = app_path('CustomPhp/PdfPhp/fonts/ArialNB.ttf');
    $arial = TCPDF_FONTS::addTTFfont($arial_n, 'TrueTypeUnicode', '', 96);
    $arial_bold = TCPDF_FONTS::addTTFfont($arial_b, 'TrueTypeUnicode', '', 96);

    $height = $pdf::getPageHeight() - 35;


    //sets the height of a line
    $pdf::setCellHeightRatio(1.5);
    // removes the horizontal rules in the header and the footer
    $pdf::SetPrintHeader(false);
    $pdf::SetPrintFooter(false);

    //$pdf->setListIndentWidth(8);


    // Add a page
    $pdf::AddPage();

    $content = <<<HTML
            <style>
                body{
                    font-family: {$arial};
                    font-size: 11px;
                }
                p{
                    text-indent: -5px;
                }
                ul{
                    text-indent: 25px
                }
            </style>

            <body>
                <img src="{$logoPath}" />
                <br>
                <br>

                <table>
                    <tr>
                        <td style="width: 8%;"></td>
                        <td style="width: 80%">
                            <div>
                                {$content}
                            </div>
                        </td>
                        <td style="width: 8%"></td>
                    </tr>
                </table>
            </body>
        HTML;

    // Print text using writeHTMLCell()
    $pdf::writeHTMLCell(0, 0, '', '', $content, 0, 1, 0, true, 'J', true);

    $footer = <<<HTML
            <table>
                <tr>
                    <td style="width: 8%"></td>
                    <td>
                        <p style="text-indent: -5px; font-family: {$arial}; font-size: 11px">
                            BURKINA INSTITITE OF TECHNOLOGY<br>
                            322 Koudougou // Burkina Faso // mail@bit.bf // www.bit.bf
                        </p>
                    </td>
                </tr>
            </table>
        HTML;

    $pdf::writeHTMLCell(0, 0, "", $height . '', $footer,  0, 1, 0, true, 'L', true);

    //sets transparency of the watermark image
    $pdf::SetAlpha(0.17);


    //$pdf->Image("../pdf/logo.png", 8, 195, 1000, 180, '', '', '', false, 300, '', false, false, 0, false, true, false);
    $pdf::Image($logoPath, 8, 195, 1000, 180, '', '', '', false, 300, '', false, false, 0, false, true, false);


    // ---------------------------------------------------------
    //must be downloaded directly or not
    if ($download) {
        // Close and output PDF document
        $pdf::Output('attestation de stage ' . $name . '.pdf', 'I');
    } else {
        $pdf::Output($saveInFolder . DIRECTORY_SEPARATOR . 'attestation de stage ' . $name . '.pdf', 'F');
    }
    //============================================================+
    // END OF FILE
    //============================================================+
}
    //InternshipCertificate('Hello World', $name = "Yaro Emmanuel");
