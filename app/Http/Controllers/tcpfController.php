<?php

namespace App\Http\Controllers;

use diploma;
use Illuminate\Http\Request;
use Elibyy\TCPDF\Facades\TCPDF;

// require "./diplom.php";
require_once(app_path('CustomPhp/PdfPhp/diplom.php'));
require_once(app_path('CustomPhp/PdfPhp/diplomaAttestation.php'));
require_once(app_path('CustomPhp/PdfPhp/internshipCertificate.php'));

class tcpfController extends Controller
{

    public function pdf()
    {

        pdfFile('fr', "NANA Jeremie", " Yaro Emma", true, "0003", 'bs00006', "2021-2022", 'Computer Science', "Mathematics");
    }
    public function pdfAtestation()
    {
        diplomaAttestation("Nana Jeremie", "01-01-1997", "Koudougou", 6, "01-01-2021", 'Computer Science', 'Bien', "hjhjhj", '620', '01-06-2022', "Yaro Emma", '');
    }
    public function certificate()
    {
        InternshipCertificate('dvjdviodvoidvuiodyvhudyvduivydvuiyvdivdyviuvyviudvdyvdiuvyduivdyuvidvhdiuvhdioveujieyvuetyey7vtev8y', 'Nana Jeremie');
    }
}