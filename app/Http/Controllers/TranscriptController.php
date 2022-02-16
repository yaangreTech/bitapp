<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Conforme;
use App\Models\Inscription;
use Illuminate\Http\Request;

class TranscriptController extends Controller
{
    //
    function index(){
        return view('pages.documents.grades');
    }

    function view(){
        return view('pages.documents.grades_view');
    }

    function getGradesOf($yearID, $classID){
       $classe= Classe::findOrFail($classID);
        $inscriptions=$classe->inscriptions->where('year_id', $yearID);
        foreach ($inscriptions as $inscription){
          $conforme=new Conforme();
            $inscription->student;
            $tus= $classe->tus;
            $t_credit=0;
              $t_n_ponderer=0;
              $status='Pass';
              $average=0;
            foreach ($tus as $tu){
              $modules=$tu->modulus;
              $tu_average=0;
              $tu_credit=0;
              $tu_ponderer=0;
              foreach ($modules as $mod){
                  $tests=$mod->tests->where('year_id', $yearID);
                  $note=0;
                  foreach($tests as $test){    
                      $mark=$test->markOf($inscription->id);
                      if($mark !=null){
                        $mark=$mark->getAttributes();
                        $note+=$mark['value']*$test->ratio/100;
                      }                    
                  }
                     $mod= $mod->getAttributes();
                    $tu_credit+=$mod['credict'];
                    $tu_ponderer+=$note*$mod['credict'];
              }

               $t_n_ponderer+=$tu_ponderer;
                    $t_credit+=$tu_credit;
                    $tu_credit>0?
                    $tu_average=round($tu_ponderer/$tu_credit,2)
                    :
                    $tu_average=$tu_ponderer;

              if($tu_average<8){
                $status='Fail';
              }
              
            }

            
            if($t_credit>0){
              $average=round($t_n_ponderer/$t_credit,2);
            }
            $inscription['conforme']=$conforme->conformeOf( $average);
            $inscription['t_n_average']=$average;
            $inscription['t_n_status']= $status;
            
        }
        return response()->json($inscriptions);

    }

    function viewGradesOf($inscID){
        // $semester=Semester::findOrFail($semesterID);
        // $theadModulus=$semester->modulus;
        // $tus= $semester->tus;
        // $inscriptions=$semester->classe->inscriptions->where('year_id', $yearID);
        $inscription=Inscription::findOrFail($inscID);
        $classe=$inscription->classe;
        $inscription->promotion;
        $classe->branche->departement;
        $semesters=$inscription->classe->semesters;
        foreach($semesters as $semester){
          $conforme=new Conforme();
            $semester->semestre_name;
            $tus= $semester->tus;
            $les_note=Array();
            $inscription->student;
            $s_credit=0;
            $s_n_modulus=0;
            $s_validation="validate";
              $s_n_ponderer=0;
              $status='Pass';
              $redo_mod='';
              $average=0;
            foreach ($tus as $tu){
              $modules=$tu->modulus;
              $tu_average=0;
              $tu_credit=0;
              $tu_ponderer=0;
              $tu_validation='validate';
              $tu['t_n_modulus']=$modules->count();
              $s_n_modulus+=$modules->count();
              foreach ($modules as $mod){
                  $tests=$mod->tests->where('year_id', $inscription->year_id);
                  $note=0;
                  $pourcentage=0; 
                  foreach($tests as $test){    
                      $mark=$test->markOf($inscription->id);
                      if($mark !=null){
                        $mark=$mark->getAttributes();
                        $pourcentage+=$test->ratio;
                        $note+=$mark['value']*$test->ratio/100;
                      }                    
                  }
                  $mod['note']=round($note,2);
                    $mod['pourcentage']=$pourcentage;  
                    $mod= $mod->getAttributes();
                    // array_push($les_note, $mod);
                    $tu_credit+=$mod['credict'];
                    $tu_ponderer+=$note*$mod['credict'];
              }

               $s_n_ponderer+=$tu_ponderer;
                    $s_credit+=$tu_credit;
                    $tu_credit>0?
                    $tu_average=round($tu_ponderer/$tu_credit,2)
                    :
                    $tu_average=$tu_ponderer;
             
              if($tu_average<8){
                $status='Fail';
                $tu_validation="Not validate";
                $s_validation="Not validate";
                // $redo_mod= $redo_mod.', '.$tu->name;
              }

              $tu['tu_validation']=$tu_validation;
              $tu['tu_average']=$tu_average;
              $tu['conforme']=$conforme->conformeOf($tu_average);
              $tu['tu_credit']=$tu_credit;
              
            }
            // $inscription['notes']=$les_note;
            // $semester=$semester->getAttributes();
            $semester['s_credit']=$s_credit;
            $semester['s_n_ponderer']=$s_n_ponderer;
            $semester['s_n_modulus']=$s_n_modulus;
            if($s_credit>0){
              $average=round($s_n_ponderer/$s_credit,2);
            }
            if($average<10){
              $s_validation="Not validate";
            }
            $semester['s_n_average']=$average;
            $semester['s_validation']=$s_validation;
            $semester['conforme']=$conforme->conformeOf($average);
            $semester['s_n_status']= $status;
            // $inscription['t_n_redo_mod']= $redo_mod;
            
        }
        
        return response()->json($inscription);

    }
}
