<?php

namespace App\Http\Controllers;

use diploma;
use Carbon\Carbon;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Elibyy\TCPDF\Facades\TCPDF;

// require "./diplom.php";
require_once(app_path('CustomPhp/PdfPhp/diplom.php'));
require_once(app_path('CustomPhp/PdfPhp/diplomaAttestation.php'));
require_once(app_path('CustomPhp/PdfPhp/internshipCertificate.php'));

class tcpfController extends Controller
{

    public function pdfDiplom($inscription_id, $lang)
    {
        $inscription = Inscription::findOrFail($inscription_id);
        $inscription->with(['student', 'level']);
        // $today = Carbon::now()->format('l F jS\\, Y');

        pdfFile($lang, "Dr. Rodrigue KABORE", $inscription->student->first_name . ' ' . $inscription->student->Last_name, $inscription->student->gender=='M', "0003", $inscription->student->matricule, $inscription->year->name, $inscription->level->branche->departement->name, $inscription->level->branche->name);
    }
    public function pdfAtestation($inscription_id)
    {
        $inscription = Inscription::findOrFail($inscription_id);
        $inscription->with(['student', 'level']);
        diplomaAttestation(
            $inscription->student->first_name . ' ' . $inscription->student->Last_name, 
            $inscription->student->birth_date, 
            "Koudougou", 
            $inscription->student->matricule, 
            $inscription->year->name, 
            $inscription->level->branche->departement->name,
             'Bien', 
             $inscription->level->branche->name, 
             '620', 
             Carbon::now(), 
             "Dr. Rodrigue KABORE", 
             '');
    }
    public function certificate()
    {
        InternshipCertificate('dvjdviodvoidvuiodyvhudyvduivydvuiyvdivdyviuvyviudvdyvdiuvyduivdyuvidvhdiuvhdioveujieyvuetyey7vtev8y', 'Nana Jeremie');
    }
}
