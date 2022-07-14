<?php
use Mpdf\Mpdf as PDF;
// use Mpdf\Mpdf as PDF; 
 function document($lang = "en",$today, $data)
    {
        // Setup a filename 
        $documentFileName = "fun.pdf";
 
        // Create the mPDF document
        $document = new PDF( [
            'mode' => 'utf-8',
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
//         $document->WriteHTML('
//          <section class="">
//         <table class="table">
//             <tr>
//                 <td colspan="3" class="center">
//                 <div class="center">
//                     <!-- <span class="center"> -->
//                         Autorisation de création: N°
//                         2018-00/01347/MESRSI/SG/DGESup/DIPES du 13 Septembre 2018
//                         <!-- </span><span class="center"> --><br/>
//                             Autorisation d’ouverture: N°
//                         2018-00001511/MESRSI/SG/DGESup/DIPES du 25 Septembre 2018
//                         <!-- </span>  -->
//                     </div>
//                 </td>
//             </tr>
//             <tr>
//                 <td>
//                     <div class="center align-center">
                   
//                         <img src="'.$logoPath.'"
//                         width="500.02"/>
//                     </div>
//                 </td>
//                 <td>
//                 </td>
//                 <td class="center align-center">
//                     <p class="addr-font-h3"><strong>B</strong>URKINA
//                         <strong>F</strong>ASO
//                     </p>
//                     <p class="font-bold addr-font-h4">
//                         Ministry of Higher Education,<br /> Scientific Research and
//                         Innovation
//                     </p>
//                 </td>
//             </tr>
//             <tr>
//                 <td colspan="3">
//                     <div class="center">
//                         <h3 class="center "><span class="titre"
//                                 >Grade
//                                 Transcript</span>
//                         </h3>
//                     </div>
//                 </td>
//             </tr>

         
//         </table>     
//      </section>
//    ');

//    <tr>
//    <td>
//        {{-- <div class="" style="text-align: left">
//            <span class="sname">Surname</span>:<span>{{$data->student->first_name}}</span><br/>
//            <span class="sname"> Name</span>:<span>{{$data->student->Last_name}}</span><br/>
//            <span class="sname"> ID</span>:<span>{{$data->student->matricule }}</span><br/>
//        </div> --}}
//    </td>
//    <td></td>
//    <td class="center align-center">
//    {{-- <div>
//        <span class="sref">Accademic Year</span>:<span>{{$data->level->label }}</span><br/>
//        <span class="sref">Graduation Year</span>:<span>{{$data->year->name}}</span><br/>
//        <span class="sref">Subject</span>:<span>{{$data->level->branche->departement->label}}</span><br/>
//    </div> --}}
//    </td>
// </tr> 
        // Use Blade if you want
        $document->WriteHTML(view('pages.documents.grades_pdf_view', compact('lang','data','today')));
         
        // Save PDF on your public storage 

         $document->Output('documentFileName.pdf', "I");

        // Storage::disk('public')->put($documentFileName, $document->Output($documentFileName, "S"));
         
        // // Get file back from storage with the give header informations
        // return Storage::disk('public')->download($documentFileName, 'Request', $header); //
    }