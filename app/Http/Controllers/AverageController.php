<?php

namespace App\Http\Controllers;

use App\Models\Conforme;
use App\Models\Semester;
use App\Models\Sessione;
use Illuminate\Http\Request;

class AverageController extends Controller
{
    public function index()
    {
        return view('pages.averages.semester_averages');
    }

    // function to get students average from the database
    public function getAverageOf($yearID, $semesterID)
    {   
        // get the semester
        $semester = Semester::findOrFail($semesterID);

        // modulus to buid the table head later
        $theadModulus = $semester->modulus;

        // get all tus of the semester 
        $tus = $semester->tus;

        // all inscription of the classe for the given year
        $inscriptions = $semester->classe->inscriptions->where(
            'year_id',
            $yearID
        );

        // loop each inscriptions
        foreach ($inscriptions as $inscription) {
            // new instance of the year
            $conforme = new Conforme();

            // tus to calculate the year
            $tus = $semester->tus;

            // variable to save all marks of a students
            $les_note = [];

            // bind student references to the variable
            $inscription->student;

            // variable for cumulative credict
            $t_credit = 0;

            // variable for cumulative ponderer
            $t_n_ponderer = 0;

            // variable for ths students semester status.=>default->pass
            $status = 'Pass';
            $redo_mod = '';
            $redo_mod_ = '';
            $average = 0;
            foreach ($tus as $tu) {
                $modules = $tu->modulus;
                $tu_average = 0;
                $tu_credit = 0;
                $tu_ponderer = 0;
                foreach ($modules as $mod) {
                    $tests = $mod->tests
                        ->where('year_id', $yearID)
                        ->where('type', 'normal');
                    $note = 0;
                    $pourcentage = 0;
                    foreach ($tests as $test) {
                        $mark = $test->markOf($inscription->id);
                        if ($mark != null) {
                            $mark = $mark->getAttributes();
                            $pourcentage += $test->ratio;
                            $note += ($mark['value'] * $test->ratio) / 100;
                        }
                    }
                    $mod['note'] = round($note, 2);
                    $mod['pourcentage'] = $pourcentage;
                    $mod = $mod->getAttributes();
                    array_push($les_note, $mod);
                    $tu_credit += $mod['credict'];
                    $tu_ponderer += $note * $mod['credict'];
                }

                $t_n_ponderer += $tu_ponderer;
                $t_credit += $tu_credit;
                $tu_credit > 0
                    ? ($tu_average = round($tu_ponderer / $tu_credit, 2))
                    : ($tu_average = $tu_ponderer);

                if ($tu_average < 8) {
                    $status = 'Fail';
                    $redo_mod = $redo_mod . ', ' . $tu->name;
                }

                if (/*$tu_average >= 8 && */ $tu_average < 10) {
                    $redo_mod_ = $redo_mod_ . ', ' . $tu->name;
                }
            }
            $inscription['notes'] = $les_note;
            $inscription['t_credit'] = $t_credit;
            $inscription['t_n_ponderer'] = round($t_n_ponderer, 2);

            if ($t_credit > 0) {
                $average = round($t_n_ponderer / $t_credit, 2);
            }
            if ($average < 10) {
                $status = 'Fail';
                $inscription['t_n_redo_mod'] = $redo_mod;
                if ($redo_mod == '') {
                    $inscription['t_n_redo_mod'] = $redo_mod_;
                }
            } else {
                $inscription['t_n_redo_mod'] = $redo_mod;
            }
            $inscription['conforme'] = $conforme->conformeOf($average);
            $inscription['t_n_average'] = $average;
            $inscription['t_n_status'] = $status;
        }

        $page_title=Semester::findOrFail($semesterID);
        $page_title->semestre_name;
        $page_title->classe->branche->departement;

        return response()->json([
            'theadModulus' => $theadModulus,
            'inscriptions' => $inscriptions,
            'page_title'=>$page_title
        ]);
    }

    // function to get students average with session from the database
    public function getAverage_with_session_Of($yearID, $semesterID)
    {
        $semester = Semester::findOrFail($semesterID);
        $theadModulus = $semester->modulus;
        $tus = $semester->tus;
        $inscriptions = $semester->classe->inscriptions->where(
            'year_id',
            $yearID
        );
        foreach ($inscriptions as $inscription) {
            $conforme = new Conforme();
            $tus = $semester->tus;
            $les_note = [];
            $inscription->student;
            $t_credit = 0;
            $t_n_ponderer = 0;
            $status = 'Pass';
            $redo_mod = '';
            $redo_mod_ = '';
            $average = 0;
            foreach ($tus as $tu) {
                $modules = $tu->modulus;
                $tu_average = 0;
                $tu_credit = 0;
                $tu_ponderer = 0;
                foreach ($modules as $mod) {
                    $sessione = new Sessione();
                    $tests = $mod->tests
                        ->where('year_id', $yearID)
                        ->where('type', 'normal');
                        // dd($sessione->has_Session_mark(
                        //     $yearID,
                        //     $mod->id,
                        //     $inscription->id
                        // ));
                    if (
                        $sessione->has_Session_mark(
                            $mod->id,
                            $inscription->id
                        )
                    ) {

                        $tests = $mod->tests
                            ->where('year_id', $yearID)
                            ->where('type', 'session');

                            
                    }
                    $note = 0;
                    $pourcentage = 0;
                    foreach ($tests as $test) {
                        $mark = $test->markOf($inscription->id);
                        if ($mark != null) {
                            $mark = $mark->getAttributes();
                            $pourcentage += $test->ratio;
                            $note += ($mark['value'] * $test->ratio) / 100;
                        }
                    }
                    $mod['note'] = round($note, 2);
                    $mod['pourcentage'] = $pourcentage;
                    $mod = $mod->getAttributes();
                    array_push($les_note, $mod);
                    $tu_credit += $mod['credict'];
                    $tu_ponderer += $note * $mod['credict'];
                }

                $t_n_ponderer += $tu_ponderer;
                $t_credit += $tu_credit;
                $tu_credit > 0
                    ? ($tu_average = round($tu_ponderer / $tu_credit, 2))
                    : ($tu_average = $tu_ponderer);

                if ($tu_average < 8) {
                    $status = 'Fail';
                    $redo_mod = $redo_mod . ', ' . $tu->name;
                }

                if (/*$tu_average >= 8 && */ $tu_average < 10) {
                    $redo_mod_ = $redo_mod_ . ', ' . $tu->name;
                }
            }
            $inscription['notes'] = $les_note;
            $inscription['t_credit'] = $t_credit;
            $inscription['t_n_ponderer'] = round($t_n_ponderer, 2);

            if ($t_credit > 0) {
                $average = round($t_n_ponderer / $t_credit, 2);
            }
            if ($average < 10) {
                $status = 'Fail';
                $inscription['t_n_redo_mod'] = $redo_mod;
                if ($redo_mod == '') {
                    $inscription['t_n_redo_mod'] = $redo_mod_;
                }
            } else {
                $inscription['t_n_redo_mod'] = $redo_mod;
            }
            $inscription['conforme'] = $conforme->conformeOf($average);
            $inscription['t_n_average'] = $average;
            $inscription['t_n_status'] = $status;
        }
        return response()->json([
            'theadModulus' => $theadModulus,
            'inscriptions' => $inscriptions,
        ]);
    }
}
