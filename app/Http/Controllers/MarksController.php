<?php

namespace App\Http\Controllers;

use App\Models\Tu;
use Carbon\Carbon;
use App\Models\Test;
use App\Models\Module;
use Illuminate\Http\Request;

class MarksController extends Controller
{
  public function index(){
      return view('pages.marks.marks_modulus');
  }

public function getMarksModulusOf($yearID,$semesterID){
    $tus=Tu::all()->where('semester_id',$semesterID);
    foreach($tus as $tu){
      $modulus=$tu->modulus;
      foreach($modulus as $modulu){
      $modulu->tests->where('year_id',$yearID);
      }
    }
    return response()->json($tus);
}

public function getMarksModulusTestsOf($yearID,$modulusID){
  $modulu=Module::findOrFail($modulusID);
  $tests=$modulu->tests->where('year_id',$yearID);
  
  return response()->json($tests);
}

public function storeTest(Request $request,$yearID,$modulusID){
  $modulu=Module::findOrFail($modulusID);

  if($request->test_type=='session'){
    $request->validate([
      'test_type'=>['required'],
    ]);

    $test=Test::insert([
      'module_id'=>$modulusID,
      'year_id'=>$yearID,
      'type'=>$request->test_type,
      'title'=>$request->test_type,
      'ratio'=>100,
      'created_at'=>Carbon::now(),
      'updated_at'=>Carbon::now(),
    ]);
  }else{
    $request->validate([
      'test_type'=>['required'],
      'test_label'=>['required'],
      'test_ration'=>['required'],
    ]);

    $others=$modulu->tests->whereIn('title',['Attendance', 'Participation'])->where('year_id',$yearID);
    if($others->count()==0){
      Test::insert([
        'module_id'=>$modulusID,
        'year_id'=>$yearID,
        'type'=>$request->test_type,
        'title'=>'Attendance',
        'ratio'=>5,
        'created_at'=>Carbon::now(),
        'updated_at'=>Carbon::now(),
      ]);
      Test::insert([
        'module_id'=>$modulusID,
        'year_id'=>$yearID,
        'type'=>$request->test_type,
        'title'=>'Participation',
        'ratio'=>5,
        'created_at'=>Carbon::now(),
        'updated_at'=>Carbon::now(),
      ]);
    }
    $test=Test::insert([
      'module_id'=>$modulusID,
      'year_id'=>$yearID,
      'type'=>$request->test_type,
      'title'=>$request->test_label,
      'ratio'=>$request->test_ration,
      'created_at'=>Carbon::now(),
      'updated_at'=>Carbon::now(),
    ]);
  }
 return response()->json($test);

}

public function updateTest(Request $request, $id){
  if($request->test_type=='session'){
  $test=true;
  }else{
    $request->validate([
      'test_type'=>['required'],
      'test_label'=>['required'],
      'test_ration'=>['required'],
    ]);
    $test=Test::findOrFail($id);
    $test->type=$request->test_type;
    $test->title=$request->test_label;
    $test->ratio=$request->test_ration;
  $test=$test->update();
  }

return response()->json($test);
}


public function deleteTest($id){
  $test=Test::findOrFail($id);
  $test=$test->delete();

  return response()->json($test);
}
}