<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Models\Level;
use App\Models\Conforme;
use App\Models\Sessione;
use App\Models\Inscription;
use Illuminate\Http\Request;


class TranscriptController extends Controller
{
    //




    function index()
    {
        return view('pages.documents.grades');
    }

    function view()
    {
        // isoFormat('Do MMMM', 'MMMM YYYY')

        // $today=Carbon::now()->isoFormat('dddd, MMMM D, YYYY');
        $today=Carbon::now()->format('l F jS\\, Y');
        return view('pages.documents.grades_view', compact('today'));
    }

    function getGradesOf($yearID, $classID)
    {
        $level = Level::findOrFail($classID);
        $inscriptions = $level->inscriptions->where('year_id', $yearID);
        $head_element = [];
        foreach ($inscriptions as $inscription) {
            $conforme = new Conforme();
            $inscription->student;
            $semesters = $level->semesters;
            $t_credit = 0;
            $t_n_ponderer = 0;
            $status = 'Pass';
            $average = 0;
            $average_s = 0;
            $year_semester = [];
            $head_element = [];
            foreach ($semesters as $semester) {
                array_push($head_element, $semester);
                $tus = $semester->tus;
                $s_average = 0;
                $s_credit = 0;
                $s_ponderer = 0;
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
                    $semester['s_n_average'] = round(
                        $s_ponderer / $s_credit,
                        2
                    );
                } else {
                    $average += $s_ponderer;
                    $semester['s_n_average'] = round($s_ponderer, 2);
                }

                if ($semester['s_n_average']  < 10) {
                    $status = 'Fail';
                }

                $t_credit += $s_credit;

                array_push($year_semester, $semester->getAttributes());
            }
            if ($t_credit > 0) {
                $average = round($average / 2, 2);
            }

            $inscription['conforme'] = $conforme->conformeOf($average);
            $inscription['t_n_average'] = $average;
            $inscription['t_n_status'] = $status;
            $inscription['year_semesters'] = $year_semester;
            // $inscription=$inscription->getAttributes();
        }

        $page_title = Level::findOrFail($classID);
        $page_title->branche->departement;
        return response()->json([
            'head_element' => $head_element,
            'inscriptions' => $inscriptions,
            'page_title' => $page_title
        ]);
    }


    function getGrades_with_session_Of($yearID, $classID)
    {
        $level = Level::findOrFail($classID);
        $inscriptions = $level->inscriptions->where('year_id', $yearID);

        foreach ($inscriptions as $inscription) {
            $conforme = new Conforme();
            $inscription->student;
            $semesters = $level->semesters;
            $t_credit = 0;
            $t_n_ponderer = 0;
            $status = 'Pass';
            $average = 0;
            $average_s = 0;
            $year_semester = [];
            $head_element = [];
            foreach ($semesters as $semester) {
                array_push($head_element, $semester);
                $tus = $semester->tus;
                $s_average = 0;
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
                            ->where('year_id', $yearID)
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
                    $semester['s_n_average'] = round(
                        $s_ponderer / $s_credit,
                        2
                    );
                } else {
                    $average += $s_ponderer;
                    $semester['s_n_average'] = round($s_ponderer, 2);
                }

                if ($semester['s_n_average']  < 10) {
                    $status = 'Fail';
                }

                $t_credit += $s_credit;

                array_push($year_semester, $semester->getAttributes());
            }
            if ($t_credit > 0) {
                $average = round($average / 2, 2);
            }

            $inscription['conforme'] = $conforme->conformeOf($average);
            $inscription['t_n_average'] = $average;
            $inscription['t_n_status'] = $status;
            $inscription['year_semesters'] = $year_semester;
            // $inscription=$inscription->getAttributes();
        }
        return response()->json([
            'head_element' => $head_element,
            'inscriptions' => $inscriptions,
        ]);
    }

    function viewGradesOf($inscID)
    {
        $inscription = Inscription::findOrFail($inscID);
        $level = $inscription->level;
        $inscription->promotion;
        $inscription->year;
        $level->branche->departement;
        $semesters = $inscription->level->semesters;
        foreach ($semesters as $semester) {
            $conforme = new Conforme();
            $tus = $semester->tus;
            $les_note = [];
            $inscription->student;
            $s_credit = 0;
            $s_v_credit = 0;
            $s_n_modulus = 0;
            $s_validation = 'Validated';
            $s_n_ponderer = 0;
            $status = 'Pass';
            $redo_mod = '';
            $average = 0;
            foreach ($tus as $tu) {
                $modules = $tu->modulus;
                $tu_average = 0;
                $tu_credit = 0;
                $tu_v_credit=0;
                $tu_ponderer = 0;
                $tu_validation = 'V';
                $tu['t_n_modulus'] = $modules->count();
                $s_n_modulus += $modules->count();
                foreach ($modules as $mod) {
                    $tests = $mod->tests
                        ->where('year_id', $inscription->year_id)
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
                    // array_push($les_note, $mod);
                    $tu_credit += $mod['credict'];
                    $tu_ponderer += $note * $mod['credict'];
                }

                $s_n_ponderer += $tu_ponderer;
                $s_credit += $tu_credit;
                $tu_credit > 0
                    ? ($tu_average = round($tu_ponderer / $tu_credit, 2))
                    : ($tu_average = $tu_ponderer);

                if ($tu_average < 8) {
                    $status = 'Fail';
                    $tu_validation = 'NV';
                    $s_validation = 'Not Validated';
                    $tu_v_credit=0;
                    
                    // $redo_mod= $redo_mod.', '.$tu->name;
                }else if($tu_average >= 8 && $tu_average < 10){
                    $tu_validation = 'V/C';
                    $tu_v_credit=$tu_credit;
                }else if($tu_average >= 10){
                    $tu_v_credit=$tu_credit;
                }

                $tu['tu_validation'] = $tu_validation;
                $tu['tu_average'] = $tu_average;
                $tu['conforme'] = $conforme->conformeOf($tu_average);
                $tu['tu_credit'] = $tu_credit;
                $tu['tu_v_credit'] = $tu_v_credit;

                $s_v_credit=$s_v_credit+$tu_v_credit;
            }
            // $inscription['notes']=$les_note;
            // $semester=$semester->getAttributes();
            $semester['s_credit'] = $s_credit;
            $semester['s_v_credit'] = $s_v_credit;
            $semester['s_n_ponderer'] = $s_n_ponderer;
            $semester['s_n_modulus'] = $s_n_modulus;
            if ($s_credit > 0) {
                $average = round($s_n_ponderer / $s_credit, 2);
            }
            if ($average < 10) {
                $s_validation = 'Not validated';
            }
            $semester['s_n_average'] = $average;
            $semester['s_validation'] = $s_validation;
            $semester['conforme'] = $conforme->conformeOf($average);
            $semester['s_n_status'] = $status;
            // $inscription['t_n_redo_mod']= $redo_mod;
        }

        return response()->json($inscription);
    }

    function viewGrades_with_session_Of($inscID)
    {
        $inscription = Inscription::findOrFail($inscID);
        $level = $inscription->level;
        $inscription->promotion;
        $inscription->year;
        $level->branche->departement;
        $semesters = $inscription->level->semesters;
        foreach ($semesters as $semester) {
            $conforme = new Conforme();
            $tus = $semester->tus;
            $les_note = [];
            $inscription->student;
            $s_credit = 0;
            $s_v_credit = 0;
            
            $s_n_modulus = 0;
            $s_validation = 'Validated';
            $s_n_ponderer = 0;
            $status = 'Pass';
            $redo_mod = '';
            $average = 0;
            foreach ($tus as $tu) {
                $modules = $tu->modulus;
                $tu_average = 0;
                $tu_credit = 0;
                $tu_v_credit = 0;
                
                $tu_ponderer = 0;
                $tu_validation = 'V';
                $tu['t_n_modulus'] = $modules->count();
                $s_n_modulus += $modules->count();
                foreach ($modules as $mod) {
                    $sessione = new Sessione();
                    $tests = $mod->tests
                        ->where('year_id', $inscription->year_id)
                        ->where('type', 'normal');

                    if ($sessione->has_Session_mark($mod->id, $inscription->id)) {
                        $tests = $mod->tests
                            ->where('year_id', $inscription->year_id)
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
                    // array_push($les_note, $mod);
                    $tu_credit += $mod['credict'];
                    $tu_ponderer += $note * $mod['credict'];
                }

                $s_n_ponderer += $tu_ponderer;
                $s_credit += $tu_credit;
                $tu_credit > 0
                    ? ($tu_average = round($tu_ponderer / $tu_credit, 2))
                    : ($tu_average = $tu_ponderer);

                // if ($tu_average < 8) {
                //     $status = 'Fail';
                //     $tu_validation = 'Not validate';
                //     $s_validation = 'Not validate';
                //     // $redo_mod= $redo_mod.', '.$tu->name;
                // }

                if ($tu_average < 8) {
                    $status = 'Fail';
                    $tu_validation = 'NV';
                    $s_validation = 'Not Validated';
                    $tu_v_credit=0;
                    
                    // $redo_mod= $redo_mod.', '.$tu->name;
                }else if($tu_average >= 8 && $tu_average < 10){
                    $tu_validation = 'V/C';
                    $tu_v_credit=$tu_credit;
                }else if($tu_average >= 10){
                    $tu_v_credit=$tu_credit;
                }

                $tu['tu_validation'] = $tu_validation;
                $tu['tu_average'] = $tu_average;
                $tu['conforme'] = $conforme->conformeOf($tu_average);
                $tu['tu_credit'] = $tu_credit;
                $tu['tu_v_credit'] = $tu_v_credit;

                $s_v_credit=$s_v_credit+$tu_v_credit;
            }
            // $inscription['notes']=$les_note;
            // $semester=$semester->getAttributes();
            $semester['s_credit'] = $s_credit;
            $semester['s_v_credit'] = $s_v_credit;
            $semester['s_n_ponderer'] = $s_n_ponderer;
            $semester['s_n_modulus'] = $s_n_modulus;
            if ($s_credit > 0) {
                $average = round($s_n_ponderer / $s_credit, 2);
            }
            if ($average < 10) {
                $s_validation = 'Not validated';
            }
            $semester['s_n_average'] = $average;
            $semester['s_validation'] = $s_validation;
            $semester['conforme'] = $conforme->conformeOf($average);
            $semester['s_n_status'] = $status;
            // $inscription['t_n_redo_mod']= $redo_mod;
        }

        return response()->json($inscription);
    }
}