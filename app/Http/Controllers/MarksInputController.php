<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Mark;
use App\Models\Test;
use App\Models\Module;
use App\Models\Conforme;
use App\Models\Sessione;
use App\Models\Inscription;
use Illuminate\Http\Request;

function array_clone($array)
{
    return array_merge([], $array);
}

class MarksInputController extends Controller
{
    //
    public function index()
    {
        return view('pages.marks.add_marks');
    }

    public function view()
    {
        return view('pages.marks.vew_marks');
    }

    public function getMarksModulusMarks_sessionOf($yearID, $modulusID)
    {
        //   get the module
        $module = Module::findOrFail($modulusID);
        //  get the class of the module
        $testList=Array();
        $Tests = $module->tests
            ->where('year_id', $yearID)
            ->where('type', 'session');
        $classe = $module->tu->semester->classe;
        $S_check_inscriptions = $classe->inscriptions->where(
            'year_id',
            $yearID
        );
        $sessione = new Sessione();
        $S_check_inscriptions = $sessione->getSessionInscriptions(
            $modulusID,
            $S_check_inscriptions
        );
        foreach ($S_check_inscriptions as $inscription) {
            $inscription->student;
            $notes = [];
            $tests_ = $Tests;

            foreach ($tests_ as $test) {
                $test->markOf($inscription->id) != null
                    ? ($test['mark'] = $test
                        ->markOf($inscription->id)
                        ->getAttributes())
                    : ($test['mark'] = null);
                $test = $test->getAttributes();
                array_push($notes, $test);
            }

            $inscription['tests'] = $notes;
        }

        foreach ($Tests as $te){
          array_push($testList, $te);
        }
        return response()->json([
            'testList' => $testList,
            'inscriptions' =>  $S_check_inscriptions,
        ]);
    }


    public function getMarksModulusMarksOf($yearID, $modulusID)
    {
        //   get the module
        $module = Module::findOrFail($modulusID);
        //  get the class of the module
        $classe = $module->tu->semester->classe;
        // get the  all inscription for the year of the classe
        $inscriptions = $classe->inscriptions->where('year_id', $yearID);

        //    get all tests of the modulus for the year
        $Tests = $module->tests
            ->where('year_id', $yearID)
            ->where('type', 'normal');
        //
        foreach ($inscriptions as $inscription) {
            $inscription->student;
            $notes = [];
            $tests_ = $Tests;
            foreach ($tests_ as $test) {
                $test->markOf($inscription->id) != null
                    ? ($test['mark'] = $test
                        ->markOf($inscription->id)
                        ->getAttributes())
                    : ($test['mark'] = null);
                $test = $test->getAttributes();
                array_push($notes, $test);
            }

            $inscription['tests'] = $notes;
        }
        
        $page_title=Module::findOrFail($modulusID);
        $page_title->tu->semester->semestre_name;
        $page_title->tu->semester->classe->branche->departement;
        return response()->json([
            'testList' => $Tests,
            'inscriptions' => $inscriptions,
            'page_title'=>$page_title
        ]);
    }

    public function viewMarksModulusMarks_with_session_Of($yearID, $modulusID)
    {
        $conforme = new Conforme();
        //   get the module
        $module = Module::findOrFail($modulusID);
        //  get the class of the module
        $classe = $module->tu->semester->classe;
        // get the  all inscription for the year of the classe
        $inscriptions = $classe->inscriptions->where('year_id', $yearID);

        //    get all tests of the modulus for the year
        $Tests = $module->tests
            ->where('year_id', $yearID)
            ->where('type', 'normal');

        // loop inscription one by one
        foreach ($inscriptions as $inscription) {
            $sessione =new Sessione();
            $inscription->student;
            $notes = [];
            $tests_ = $Tests;
            if($sessione->has_Session_mark($module->id,$inscription->id)){
                $tests_ = $module->tests
                ->where('year_id', $yearID)
                ->where('type', 'session');
            }
            $average = 0;
            $t_pourcentage = 0;
            $status = 'Pass';
            foreach ($tests_ as $test) {
                if ($test->markOf($inscription->id) != null) {
                    $test['mark'] = $test
                        ->markOf($inscription->id)
                        ->getAttributes();
                    $average += ($test->mark['value'] * $test->ratio) / 100;
                } else {
                    $test['mark'] = null;
                    $average = null;
                }
                $test = $test->getAttributes();
                $t_pourcentage += $test['ratio'];
                array_push($notes, $test);
            }
            $average < 10 && ($status = 'Fail');

            $inscription['status'] = $status;
            $inscription['conforme'] = $conforme->conformeOf($average);
            $average != null && ($average = round($average, 2));
            $inscription['average'] = $average;
            $inscription['tests'] = $notes;
        }

        return response()->json([
            'testList' => $Tests,
            'inscriptions' => $inscriptions,
        ]);
    }
    public function viewMarksModulusMarksOf($yearID, $modulusID)
    {
        $conforme = new Conforme();
        //   get the module
        $module = Module::findOrFail($modulusID);
        //  get the class of the module
        $classe = $module->tu->semester->classe;
        // get the  all inscription for the year of the classe
        $inscriptions = $classe->inscriptions->where('year_id', $yearID);

        //    get all tests of the modulus for the year
        $Tests = $module->tests
            ->where('year_id', $yearID)
            ->where('type', 'normal');

        // loop inscription one by one
        foreach ($inscriptions as $inscription) {
            $inscription->student;
            $notes = [];
            $tests_ = $Tests;
            $average = 0;
            $t_pourcentage = 0;
            $status = 'Pass';
            foreach ($tests_ as $test) {
                if ($test->markOf($inscription->id) != null) {
                    $test['mark'] = $test
                        ->markOf($inscription->id)
                        ->getAttributes();
                    $average += ($test->mark['value'] * $test->ratio) / 100;
                } else {
                    $test['mark'] = null;
                    $average = null;
                }
                $test = $test->getAttributes();
                $t_pourcentage += $test['ratio'];
                array_push($notes, $test);
            }
            $average < 10 && ($status = 'Fail');

            $inscription['status'] = $status;
            $inscription['conforme'] = $conforme->conformeOf($average);
            $average != null && ($average = round($average, 2));
            $inscription['average'] = $average;
            $inscription['tests'] = $notes;
        }

        
        $page_title=Module::findOrFail($modulusID);
        $page_title->tu->semester->semestre_name;
        $page_title->tu->semester->classe->branche->departement;
        return response()->json([
            'testList' => $Tests,
            'inscriptions' => $inscriptions,
            'page_title'=>$page_title
        ]);
    }

    public function storeMarksModulusMarksOf(Request $request, $inscID, $testID)
    {
        $request->validate([
            'mark_value' => ['required', 'max:20'],
        ]);
        $mark = Mark::insert([
            'test_id' => $testID,
            'inscription_id' => $inscID,
            'value' => $request->mark_value,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return response()->json($mark);
    }
    public function updateMarksModulusMarksOf(Request $request, $markID)
    {
        $request->validate([
            'mark_value' => ['required', 'max:20'],
        ]);

        $mark = Mark::findOrFail($markID);
        $mark->value = $request->mark_value;
        $mark = $mark->update();
        return response()->json($mark);
    }
}
