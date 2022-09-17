<?php

namespace App\Http\Controllers;

use App\Models\Tu;
use App\Models\Module;
use App\Models\Student;
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
        $theadModulus = $semester->modulus($yearID);
        // $theadModulus=Module::whereIn('tu_id', Tu::where('year_id', $yearID)->where('semester_id', $semesterID)->select('id')->pluck('id'))->get();
        // dd($theadModulus);
        // get all tus of the semester
        $Vtus = $semester->tus($yearID)->load('modulus');

        // all inscription of the level for the given year
        $inscriptions = $semester->level->inscriptions->where(
            'year_id',
            $yearID
        );

        // loop each inscriptions
        foreach ($inscriptions as $inscription) {
            // new instance of the year
            $conforme = new Conforme();

            // tus to calculate the year


            $tus = $Vtus;

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
            $validate_tue = 0;
            foreach ($tus as $tu) {
                // $tu_validete=0;
                $modules = $tu->modulus;
                $tu_average = 0;
                $tu_credit = 0;
                $tu_ponderer = 0;
                foreach ($modules as $mod) {
                    $tests = $mod->tests
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
                    $tu_ponderer +=  $mod['note'] * $mod['credict'];
                    // echo "<script>console.log('credit=".$mod['credict']."')</script>";
                }

                $t_n_ponderer += $tu_ponderer;
                $t_credit += $tu_credit;


                $tu_credit > 0
                    ? ($tu_average = round($tu_ponderer / $tu_credit, 2))
                    : ($tu_average = $tu_ponderer);

                if ($tu_average < 8) {
                    $status = 'Fail';
                    $redo_mod = $redo_mod . ', ' . $tu->name;
                } else {
                    $validate_tue = $validate_tue + $tu_credit;
                }

                if (/*$tu_average >= 8 && */$tu_average < 10) {
                    $redo_mod_ = $redo_mod_ . ', ' . $tu->name;
                }

                $tu['tu_credit'] = $tu_credit;
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
            $inscription['validate_tue'] = $validate_tue;

            // dd($inscription);
        }

        $page_title = Semester::findOrFail($semesterID);
        $page_title->level->branche->departement;

        return response()->json([
            'theadModulus' => $theadModulus,
            'inscriptions' => $inscriptions,
            'page_title' => $page_title,
            'theadTus' =>  $Vtus
        ]);
    }

    // function to get students average with session from the database
    public function getAverage_with_session_Of($yearID, $semesterID)
    {
        $semester = Semester::findOrFail($semesterID);
       
       
        $theadModulus = $semester->modulus($yearID);
       
        $Vtus = $semester->tus($yearID)->load('modulus');

        $inscriptions = $semester->level->inscriptions->where(
            'year_id',
            $yearID
        );
        
        foreach ($inscriptions as $inscription) {
            
            $conforme = new Conforme();
            $did_session=false;
            $tus = $Vtus;
            $les_note = [];
            $inscription->student;
            $t_credit = 0;
            $t_n_ponderer = 0;
            $status = 'Pass';
            $redo_mod = '';
            $redo_mod_ = '';
            $average = 0;
            $validate_tue = 0;
            foreach ($tus as $tu) {
                
                $modules = $tu->modulus;
                $tu_average = 0;
                $tu_credit = 0;
                $tu_ponderer = 0;
                foreach ($modules as $we=>$mod) {
                 
                    $sessione = new Sessione();
                    $tests = [];
                    // dd($sessione->has_Session_mark(
                    //     $yearID,
                    //     $mod->id,
                    //     $inscription->id
                    // ));
                        // ====================================
                    
                        $normal_tests = $mod->tests
                                ->where('type', 'normal');
                               
                        $sessions_tests=[];
                        $note_normal= 0;
                        $note_Session= 0;

                        //  if ($sessione->has_Session_mark($mod->id, $inscription->id)) {
                        //      $sessions_tests = $mod->tests
                        //          ->where('year_id', $inscription->year_id)
                        //          ->where('type', 'session');
                        //  }


                        if ($sessione->has_Session_mark($mod->id,$inscription->id)) {
                            $sessions_tests = $mod->tests->where('type', 'session');
                            $did_session=true;
                        }
                       
                        foreach ($normal_tests as $normal_test) {
                            
                             if($normal_test->markOf($inscription->id)!=null) {
                                
                                $note_normal += ($normal_test->markOf($inscription->id)['value'] * $normal_test->ratio) / 100;
                              
                             }
                           
                        }
                        
                        foreach ($sessions_tests as $sessions_test) {
                            if($sessions_test->markOf($inscription->id)!=null) {
                                $note_Session += ($sessions_test->markOf($inscription->id)['value'] * $sessions_test->ratio) / 100;
                            }
                        }
                       
                        $tests=$sessions_tests;
                        $mod['choix']='session';
                        if($note_normal>$note_Session){
                            $tests=$normal_tests;
                            $mod['choix']='normal';
                        }
                        // ===================================



                       
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
                  
                    // if( $we==1){dd($les_note);}
                      
                }
               
                $t_n_ponderer += $tu_ponderer;
                $t_credit += $tu_credit;
                $tu_credit > 0
                    ? ($tu_average = round($tu_ponderer / $tu_credit, 2))
                    : ($tu_average = $tu_ponderer);

                if ($tu_average < 8) {
                    $status = 'Fail';
                    $redo_mod = $redo_mod . ', ' . $tu->name;
                } else {
                    $validate_tue = $validate_tue + $tu_credit;
                }

                if (/*$tu_average >= 8 && */$tu_average < 10) {
                    $redo_mod_ = $redo_mod_ . ', ' . $tu->name;
                }
                $tu['tu_credit'] = $tu_credit;
            }
            $inscription['notes'] = $les_note;
            $inscription['t_credit'] = $t_credit;
            $inscription['t_n_ponderer'] = round($t_n_ponderer, 2);
            $inscription['validate_tue'] = $validate_tue;

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
            $inscription['did_session'] = $did_session;
            
        }

      
        return response()->json([
            'theadModulus' => $theadModulus,
            'inscriptions' => $inscriptions,
            'theadTus' => $Vtus
        ]);
    }
}