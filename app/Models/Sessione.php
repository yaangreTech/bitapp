<?php

namespace App\Models;

use App\Models\Test;
use App\Models\Module;
use App\Models\Conforme;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sessione extends Model
{
    use HasFactory;



    public function has_Session_mark($modulusID,$inscriptionID){
        $module = Module::findOrFail($modulusID);
        $inscription=Inscription::findOrFail($inscriptionID);
        $has_session=false;

        $session_tests=$module->tests->where('year_id', $inscription->year_id)->where('type', 'session');
        
        if($session_tests->count()!=0){
            foreach($session_tests as $session_test){
                $mark=$session_test->markOf($inscription->id);
            if($mark!=null){
                $has_session=true; 
            }
            }
        }

        return $has_session;
    }

    public function getSessionInscriptions($modulusID,$inscriptions){

        $module = Module::findOrFail($modulusID);
        $semester = $module->tu->semester;
        $theadModulus = $semester->modulus;
        $tus = $semester->tus;
        // $inscriptions = $semester->classe->inscriptions->where(
        //     'year_id',
        //     $yearID
        // );
        
        $inscriptions_list_cas=Array();
       


        foreach ($inscriptions as $inscription) {
            $isTheModValidated=true;
            $inscription_cas_8=null;
            $inscription_cas_10=null;
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
                    $tests = $mod->tests->where('year_id', $inscription->year_id)->where('type', 'normal');
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
                    if($mod['note']<10 && $mod->id==$module->id){
                        $isTheModValidated=false;
                    }
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

                if ($tu_average < 8 && $module->tu_id==$tu->id) {
                    $status = 'Fail';
                    $redo_mod = $redo_mod . ', ' . $tu->name;
                   $inscription_cas_8= $inscription;
                }

                if (/*$tu_average >= 8 && */ $tu_average < 10 && $module->tu_id==$tu->id) {
                    $redo_mod_ = $redo_mod_ . ', ' . $tu->name;
                    $inscription_cas_10= $inscription;
                }
            }
            // $inscription['notes'] = $les_note;
            // $inscription['t_credit'] = $t_credit;
            // $inscription['t_n_ponderer'] = round($t_n_ponderer, 2);

            if ($t_credit > 0) {
                $average = round($t_n_ponderer / $t_credit, 2);
            }

            if ($average < 10) {
                $status = 'Fail';
                if($inscription_cas_10!=null &&  $isTheModValidated==false){
                    // dd($inscription);
                    array_push($inscriptions_list_cas, $inscription) ;
                }
                // if ($redo_mod == '') {
                //     $inscription['t_n_redo_mod'] = $redo_mod_;
                // }
            } else {
                if($inscription_cas_8!=null &&  $isTheModValidated==false) {
                    
                    array_push($inscriptions_list_cas, $inscription) ;
                }
                // $inscription['t_n_redo_mod'] = $redo_mod;
            }
            // $inscription['conforme'] = $conforme->conformeOf($average);
            // $inscription['t_n_average'] = $average;
            // $inscription['t_n_status'] = $status;
        }


        return $inscriptions_list_cas;
    }
}
