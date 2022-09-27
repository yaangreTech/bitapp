<?php
use Mpdf\Mpdf as PDF;
// use Mpdf\Mpdf as PDF; 
 function document($lang = "en",$today, $data)
    {
        // Setup a filename 
        $documentFileName = "fun.pdf";
 
        // Create the mPDF document
        $document = new PDF( [
            'mode' => 'c',
            'format' => 'A4',
            'margin_header' => '3',
            'margin_top' => '8',
            'margin_bottom' => '8',
            'margin_footer' => '2',
        ]);     
 
        // Set some header informations for output
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$documentFileName.'"'
        ];
 
        // Write some simple Content
        // $document->WriteHTML(
        //     '<h1 style="color:blue">
        // TheCodingJack</h1>
        // ');
        $logoPath = app_path('CustomPhp/PdfPhp/logo.png');

        // Use Blade if you want
        $document->WriteHTML(view('pages.documents.grades_pdf_view', compact('lang','data','today')));
         
        // Save PDF on your public storage 

         $document->Output('documentFileName.pdf', "I");

        // Storage::disk('public')->put($documentFileName, $document->Output($documentFileName, "S"));
         
        // // Get file back from storage with the give header informations
        // return Storage::disk('public')->download($documentFileName, 'Request', $header); //
    }