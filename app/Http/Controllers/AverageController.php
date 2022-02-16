<?php

namespace App\Http\Controllers;

use App\Models\Conforme;
use App\Models\Semester;
use Illuminate\Http\Request;

class AverageController extends Controller
{
    public function index(){
        return view('pages.averages.semester_averages');
    }

    public function getAverageOf($yearID, $semesterID){
      
        $semester=Semester::findOrFail($semesterID);
        $theadModulus=$semester->modulus;
        $tus= $semester->tus;
        $inscriptions=$semester->classe->inscriptions->where('year_id', $yearID);
        foreach ($inscriptions as $inscription){
          $conforme=new Conforme();
            $tus= $semester->tus;
            $les_note=Array();
            $inscription->student;
            $t_credit=0;
              $t_n_ponderer=0;
              $status='Pass';
              $redo_mod='';
              $average=0;
            foreach ($tus as $tu){
              $modules=$tu->modulus;
              $tu_average=0;
              $tu_credit=0;
              $tu_ponderer=0;
              foreach ($modules as $mod){
                  $tests=$mod->tests->where('year_id', $yearID);
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
                    array_push($les_note, $mod);
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
                $redo_mod= $redo_mod.', '.$tu->name;
              }
              
            }
            $inscription['notes']=$les_note;
            $inscription['t_credit']=$t_credit;
            $inscription['t_n_ponderer']=round($t_n_ponderer,2);
            $inscription['conforme']=$conforme->conformeOf($average);
            if($t_credit>0){
              $average=round($t_n_ponderer/$t_credit,2);
            }
            if($average<10){
              $status='Fail';
            }
            $inscription['t_n_average']=$average;
            $inscription['t_n_status']= $status;
            $inscription['t_n_redo_mod']= $redo_mod;
            
        }
        return response()->json(['theadModulus'=>$theadModulus,'inscriptions'=>$inscriptions]);

    }


}
