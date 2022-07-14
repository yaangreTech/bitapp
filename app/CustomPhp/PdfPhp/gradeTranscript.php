<?php

use Elibyy\TCPDF\Facades\TCPDF;

require_once(app_path('CustomPhp/customHelpers.php'));


function grateTranscript($lang = "en",$today, $data, $saveInFolder = ""): void
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

   
    $new_semester = 1;
    // semesters = data.semesters;
    $bodyElememts=null;



foreach($data->level->semesters as $semester){
$new_semester = 1;
foreach($semester->tus as $tu) {

    foreach($tu->modulus as $modul_index=>$modul) {
        
        if ($modul_index == 0) {
            if ($new_semester == 1) {
                $new_semester = -1;
             $semestre_rowspan = $semester->s_n_modulus + 1;
            
             $bodyElememts.=<<<HTML
                            <tr>
                                    <td class="center mini semester" rowspan="{$semestre_rowspan}"> <span class="rotater">{$semester->label}</span></td>
                                    <td class=" mini" rowspan="{$tu->t_n_modulus}"> {$tu->name}</td>
                                    <td class=" mini">{$modul->name}</td>
                                    <td class="center mini">{$modul->credict}</td>
                                    <td class="center mini">{$modul->note}</td>
                                    <td class="center mini" rowspan="{$tu->t_n_modulus}">{$tu->tu_average}</td>
                                    <td class="center mini" rowspan="{$tu->t_n_modulus}">{$tu->tu_credit}</td>
                                    <td class="center mini" rowspan="{$tu->t_n_modulus}">{$tu->tu_validation}</td>
                                    <td class="center mini" rowspan="{$tu->t_n_modulus}">{$tu->conforme->international_Grade}</td>
                                </tr>
                            HTML;
            } else {
              
                $bodyElememts.=<<<HTML
                                <tr>
                                    <td class=" mini" rowspan="{$tu->t_n_modulus}">{$tu->name}</td>
                                    <td class=" mini">{$modul->name}</td>
                                    <td class="center mini">{$modul->credict}</td>
                                    <td class="center mini">{$modul->note}</td>
                                    <td class="center mini" rowspan="{$tu->t_n_modulus}">{$tu->tu_average}</td>
                                    <td class="center mini" rowspan="{$tu->t_n_modulus}">{$tu->tu_v_credit}</td>
                                    <td class="center mini" rowspan="{$tu->t_n_modulus}">{$tu->tu_validation}</td>
                                    <td class="center mini" rowspan="{$tu->t_n_modulus}">{$tu->conforme->international_Grade}</td>
                                </tr> 
                             HTML;
            }
        } else {
           
            $bodyElememts.=<<<HTML
                            <tr>
                                <td class=" mini">{$modul->name}</td>
                                <td class="center mini">{$modul->credict}</td>
                                <td class="center mini">{$modul->note}</td>
                            </tr>
                         HTML;
        }
    }
}
if ($new_semester == -1) {
    $bodyElememts.=<<<HTML
                <tr class="btn-default">
                    <td colspan="2" class="center font-bold">Summary  {$semester->name}</td>
                    <td class="center font-bold">{$semester->s_credit}</td>
                    <td class="center bg-white"></td>
                    <td class="center font-bold">{$semester->s_n_average}</td>
                    <td class="center font-bold">{$semester->s_v_credit}</td>
                    <td class="center font-bold">{$semester->s_validation}</td>
                    <td class="center font-bold">{$semester->conforme->international_Grade}</td>
                </tr>
                HTML;
}
}


$newcontent=<<<HTML
<section class="content">
    <table class="table">
        <tr>
            <td colspan="3" class="center">
            <div class="center">
                <!-- <span class="center"> -->
                    Autorisation de création: N°
                    2018-00/01347/MESRSI/SG/DGESup/DIPES du 13 Septembre 2018
                    <!-- </span><span class="center"> --><br/>
                        Autorisation d’ouverture: N°
                    2018-00001511/MESRSI/SG/DGESup/DIPES du 25 Septembre 2018
                    <!-- </span>  -->
                 </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="center align-center">
                <!-- height="40.7"  -->
                    <img src="{$logoPath}" 
                    width="500.02"/>
                </div>
            </td>
            <td>
            </td>
            <td class="center align-center">
                <p class="addr-font-h3"><strong>B</strong>URKINA
                    <strong>F</strong>ASO
                </p>
                <p class="font-bold addr-font-h4">
                    Ministry of Higher Education,<br /> Scientific Research and
                    Innovation
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="center">
                    <h3 class="center "><span class="titre"
                            >Grade
                            Transcript</span>
                    </h3>
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <div class="" style="text-align: left">
                    <span class="sname">Surname</span>:<span>{$data->student->first_name }</span><br/>
                    <span class="sname"> Name</span>:<span>{$data->student->Last_name}</span><br/>
                    <span class="sname"> ID</span>:<span>{$data->student->matricule }</span><br/>
                </div>
            </td>
            <td></td>
            <td class="center align-center">
             <div>
                <span class="sref">Accademic Year</span>:<span>{$data->level->label }</span><br/>
                <span class="sref">Graduation Year</span>:<span>{$data->year->name}</span><br/>
                <span class="sref">Subject</span>:<span>{$data->level->branche->departement->label}</span><br/>
             </div>
            </td>
        </tr> 
    </table>
    
    <table class=" vrai">
        <!-- <thead> -->
            <tr nobr="true">
                <th style="" class="theade semester"></th>
                <th style="" class="theade">TU</th>
                <th style="" class="theade">TUE</th>
                <th style="" class="theade">TUE Credits</th>
                <th style="" class="theade">Grade/20</th>
                <th style="" class="theade">TU Average</th>
                <th style="" class="theade">Acquired Credits</th>
                <th style="" class="theade">TU Validation</th>
                <th style="" class="theade">Rating</th>
            </tr>
        <!-- </thead> -->
        <tbody >
            {$bodyElememts}
        </tbody>
    </table>

        <table>
            <tr>
                <td></td>
               
                <td>
                <div class="center" colspan="2">
                        Koudougou, {$today}
                    </div>
                    <div  class="center" style="width:300px;">
                            <span class="font-bold font-underline" style="color:black;">
                                Accademic
                                Director</span><br />
                        </div>
                </td>
            </tr>

            <tr>
                <td></td>
            
                <td></td>
            </tr>
            
            <tr>
                <td></td>
             
                <td colspan="2">
                <div class="center" style="width:300px;margin-top: 100px">
                            <span class="" style="color:black;text-decoration: underline"> Dr.
                                Bawindsom Marcel KEBRE</span><br/>
                            <span>Maître de Conférences (Lecturer)</span>
                        </div>
                </td>
            </tr>
        </table>  
        
        
    
    </section>
    
HTML;

    //changes the content according to the set language
    // $content = strtoupper($lang) == 'EN' ? $content_en : $content_fr;

    $content=$newcontent;
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
           .center
           {
            /* justify-content: center; */
            /* align-items: center; */
            text-align: center;
            float: center;
           }
           .titre{
            width:300px; 
            line-height: 13px;
            font-weight: bold;
            text-decoration: underline;
           }
           .sname{
            width:500px;
           }
           .vrai{
            border-collapse: collapse;
            width: 100%;
            /* table-layout:fixed */
           }
           .vrai, .vrai th, .vrai td{
            border: 1px solid !important;
           }
           .vrai tr{
            font-size:8px!important;
           }
           .vrai th{
            white-space:nowrap! important;
            align-items: center;
           }
           .theade{
            font-size:8px;
            vertical-align:sub;
            font-weight: bold;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            white-space:pre! important;
           }
           .semester{
            /* width: 5%; */
           }
           .rotater{ 
                /* writing-mode: vertical-rl;
                text-orientation: sideways;
                display:block; */
                -webkit-transform: rotate(-90deg); 
                -moz-transform: rotate(-90deg); 
           }
       </style>
       <body>
           {$content}
       </body>
   HTML;

    $pdf::writeHTMLCell(0, 0, '', '', $content, 0, 1, 0, true, 'L', true);

    //sets transparency of the watermark image
    $pdf::SetAlpha(0.14);


    $pdf::Image( $logoPath, 150, 250, 300, 100, '', '', '', false, 300, '', false, false, 0, false, true, false);

    // ---------------------------------------------------------

    $fileName = 'attestation_provisoire_' . '$student_name' . '_' . '$lang';
    //must be downloaded directly or not
    if ($download) {
        // Close and output PDF document
        $pdf::Output('attestation_provisoire_' . $fileName . '.pdf', 'I');
    } else {
        $pdf::Output($saveInFolder . DIRECTORY_SEPARATOR . $fileName . '.pdf', 'F');
    }
}