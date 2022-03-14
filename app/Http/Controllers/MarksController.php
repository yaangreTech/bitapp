<?php

namespace App\Http\Controllers;

use App\Models\Tu;
use Carbon\Carbon;
use App\Models\Test;
use App\Models\Module;
use App\Models\Semester;
use Illuminate\Http\Request;

class MarksController extends Controller
{
    public function index()
    {
        // return of mark modulus view
        return view('pages.marks.marks_modulus');
    }

    // function to the list of modulus of a guiven semester of the current year
    public function getMarksModulusOf($yearID, $semesterID)
    {
        // get tus of the given semester
        $semester= Semester::findOrFail($semesterID);
        $semester->semestre_name;
        
        $tus =  $semester->tus;
        foreach ($tus as $tu) {
          // get the modulud of the given tu
            $modulus = $tu->modulus;
            foreach ($modulus as $modulu) {
                $modulu->tests->where('year_id', $yearID);
            }
        }
        $semester->classe->branche->departement;
        return response()->json($semester);
    }

    public function getMarksModulusTestsOf($yearID, $modulusID)
    {
        $modulu = Module::findOrFail($modulusID);
        $tests = $modulu->tests->where('year_id', $yearID);

        return response()->json($tests);
    }

    public function storeTest(Request $request, $yearID, $modulusID)
    {
        $test=false;
        $total_ratio=0;
        $modulu = Module::findOrFail($modulusID);
        // condition if the test is for session
        if ($request->test_type == 'session') {
            $request->validate([
                'test_type' => ['required'],
            ]);

            $test = Test::insert([
                'module_id' => $modulusID,
                'year_id' => $yearID,
                'type' => $request->test_type,
                'title' => $request->test_type,
                'ratio' => 100,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        // if the test is not a session => if it is normal
        else {
            $request->validate([
                'test_type' => ['required'],
                'test_label' => ['required'],
                'test_ration' => ['required'],
            ]);

            // get [attendance, participation] from the test table of the given year
            $others = $modulu->tests
                ->whereIn('title', ['Attendance', 'Participation'])
                ->where('year_id', $yearID);

                // in no [attendance, participation] as test, it we insert it!
            if ($others->count() == 0) {
                Test::insert([
                    'module_id' => $modulusID,
                    'year_id' => $yearID,
                    'type' => $request->test_type,
                    'title' => 'Attendance',
                    'ratio' => 5,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                Test::insert([
                    'module_id' => $modulusID,
                    'year_id' => $yearID,
                    'type' => $request->test_type,
                    'title' => 'Participation',
                    'ratio' => 5,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
            $total_ratio=$modulu->tests
            ->where('type', 'normal')
            ->where('year_id', $yearID)
            ->sum('ratio');
            // finally we insert the test in question
            if($total_ratio+$request->test_ration<100){
                $test = Test::insert([
                    'module_id' => $modulusID,
                    'year_id' => $yearID,
                    'type' => $request->test_type,
                    'title' => $request->test_label,
                    'ratio' => $request->test_ration,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
          
        }

        // resturn the the response of the insertion
        return response()->json($test);
    }

    public function updateTest(Request $request, $id)
    {
        $modulu=Test::find($id)->module;
        $test = Test::findOrFail($id);

        $total_ratio=$modulu->tests
        ->where('type', 'normal')
        ->where('year_id', $test->year_id)
        ->sum('ratio');

        if ($request->test_type == 'session') {
            $test = false;
        } else {

            $request->validate([
                'test_type' => ['required'],
                'test_label' => ['required'],
                'test_ration' => ['required'],
            ]);
            
          
            if($total_ratio+$request->test_ration-$test->ratio<100){

                $test->type = $request->test_type;
                $test->title = $request->test_label;
                $test->ratio = $request->test_ration;
                $test = $test->update();
            }else{
                $test=false; 
            }
        }

        return response()->json($test);
    }

    public function deleteTest($id)
    {
        $test = Test::findOrFail($id);
        $test = $test->delete();

        return response()->json($test);
    }
}
