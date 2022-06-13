<?php

namespace App\Http\Controllers;

use diploma;
use Carbon\Carbon;
use App\Models\Compteur;
use App\Models\Conforme;
use App\Models\Sessione;
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
        $deplomeoder=Compteur::firstOrCreate(['name'=>'diplome']);
        



        pdfFile($lang, "Dr. Rodrigue KABORE", $inscription->student->first_name . ' ' . $inscription->student->Last_name, strtoupper(str_split($inscription->student->gender)[0]) == 'M',  $deplomeoder->value+1, $inscription->student->matricule, $inscription->year->name, $inscription->level->branche->departement->label, $inscription->level->branche->name);
        $deplomeoder->value=$deplomeoder->value+1;
        $deplomeoder->update();
    }
    public function pdfAtestation($inscription_id, $lang)
    {
        $inscription = Inscription::findOrFail($inscription_id);
        $inscription->with(['student', 'level']);


        diplomaAttestation(
            $inscription->student->first_name . ' ' . $inscription->student->Last_name,
            $inscription->student->birth_date,
            $inscription->student->birth_place,
            $inscription->student->matricule,
            $inscription->year->name,
            $inscription->level->branche->departement->label,
            $inscription->level->branche->departement->label,
            $inscription->level->branche->name,
            $this->getMensionOf($this->getaverege($inscription->id), $lang),
            Carbon::now(),
            "Dr. Rodrigue KABORE",
            ''
        );
    }
    public function certificate()
    {
        InternshipCertificate('dvjdviodvoidvuiodyvhudyvduivydvuiyvdivdyviuvyviudvdyvdiuvyduivdyuvidvhdiuvhdioveujieyvuetyey7vtev8y', 'Nana Jeremie');
    }


    public function getaverege($inscription_id)
    {
        $inscription = Inscription::findOrFail($inscription_id);
        $semesters = $inscription->level->semesters;
        $conforme = new Conforme();
        $inscription->student;

        $t_credit = 0;
        $average = 0;
        $head_element = [];
        foreach ($semesters as $semester) {
            array_push($head_element, $semester);
            $tus = $semester->tus;
            $s_credit = 0;
            $s_ponderer = 0;
            foreach ($tus as $tu) {
                $modules = $tu->modulus;
                $tu_average = 0;
                $tu_credit = 0;
                $tu_ponderer = 0;
                foreach ($modules as $mod) {
                    $sessione = new Sessione();
                    $tests = $mod->tests
                        ->where('year_id', $inscription->year_id)
                        ->where('type', 'normal');
                    $note = 0;
                    if ($sessione->has_Session_mark($mod->id, $inscription->id)) {
                        $tests = $mod->tests
                            ->where('year_id', $inscription->year_id)
                            ->where('type', 'session');
                    }
                    foreach ($tests as $test) {
                        $mark = $test->markOf($inscription->id);
                        if ($mark != null) {
                            $mark = $mark->getAttributes();
                            $note += ($mark['value'] * $test->ratio) / 100;
                        }
                    }
                    $mod = $mod->getAttributes();
                    $tu_credit += $mod['credict'];
                    $tu_ponderer += $note * $mod['credict'];
                }
                $s_ponderer += $tu_ponderer;
                $s_credit += $tu_credit;
                $tu_credit > 0
                    ? ($tu_average = round($tu_ponderer / $tu_credit, 2))
                    : ($tu_average = $tu_ponderer);

                if ($tu_average < 8) {
                    $status = 'Fail';
                }
            }
            if ($s_credit > 0) {
                $average += $s_ponderer / $s_credit;
            } else {
                $average += $s_ponderer;
            }


            $t_credit += $s_credit;

            // array_push($year_semester, $semester->getAttributes());
        }


        return round($average / 2, 2);
    }



    public function getMensionOf($average, $lang)
    {
        if ($average >= 10 && $average < 12) {
            return ['en' => 'Passable', 'fr' => 'Passable'][$lang];
        } else if ($average >= 12 && $average < 15) {
            return ['en' => 'Pretty Good', 'fr' => 'Assez Bien'][$lang];
        } else if ($average >= 15 && $average <= 16) {
            return ['en' => 'Good', 'fr' => 'Bien'][$lang];
        } else if ($average > 16 && $average <= 20) {
            return ['en' => 'Very Good', 'fr' => 'Tres Bien'][$lang];
        } else {
            return null;
        }
    }
}