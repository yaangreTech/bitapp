<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Year;
use App\Models\Parente;
use App\Models\Student;
use App\Models\Promotion;
use App\Models\Departement;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    //
public function index(){
  return view('pages.students.students');
}

  public function  displayForm(){
      $departments = Departement::all();
      if(Auth::user()->right->title=='isHd'){
        $departments = Departement::where('id',Auth::user()->manage->departement_id)->get();
      }
      $promotions = Promotion::orderBy('id','DESC')->get();

      foreach($departments as $department){
        $department->classes;
      }
     
    return view('pages.students.students-form', compact(['departments','promotions']));
  }


  public function  getStudentsOf($yearID,$classID){
    // return view('pages.students.students');
  $inscriptions=Inscription::all()->where('year_id',$yearID)->where('classe_id',$classID);
    foreach($inscriptions as $inscription){
      $inscription->student;
    }
    return response()->json($inscriptions);
  }

  public function  storeStudent(Request $request){
    $current_year = Year::all()->last();

    $request->validate([
      'studentID'=>['required'],
      'studentFirstName'=>['required'],
      'studentLastName'=>['required'],
      'studentBirthDate'=>['required'],
      'studentPhone'=>['required'],
      'studentEmail'=>['required'],
      'studentGender'=>['required'],
      'studentClasse'=>['required'],
      'studentPromotion'=>['required'],
      'studentParentFirstName'=>['required'],
      'studentParentLastName'=>['required'],
      'studentParentPhone'=>['required'],
      'studentParentProfession'=>['required'],
      'studentParentType'=>['required'],
      // 'year_id'=>['required'],
    ]);

    $student_id=Student::insertGetId([
      'matricule'=>$request->studentID,
      'first_name'=>$request->studentFirstName,
      'Last_name'=>$request->studentLastName,
      'gender'=>$request->studentGender,
      'phone'=>$request->studentPhone,
      'birth_date'=>$request->studentBirthDate,
      'email'=>$request->studentEmail,
      'promotion_id'=>$request->studentPromotion,
      'created_at'=>Carbon::now(),
      'updated_at'=>Carbon::now(),
    ]);

    $parent=Parente::insert([
      'student_id'=>$student_id,
      'first_name'=>$request->studentParentFirstName,
      'Last_name'=>$request->studentParentLastName,
      'type'=>$request->studentParentType,
      'profession'=>$request->studentParentProfession,
      'phone'=>$request->studentParentPhone,
      'created_at'=>Carbon::now(),
      'updated_at'=>Carbon::now(),
    ]);

    $inscription=Inscription::insert([
      'promotion_id'=>$request->studentPromotion,
      'student_id'=>$student_id,
      'classe_id'=>$request->studentClasse,
      'year_id'=>$current_year->id,
      'created_at'=>Carbon::now(),
      'updated_at'=>Carbon::now(),
    ]);

return response()->json($inscription);

  }
  public function  updateStudent($id){}
  public function  deleteStudent($id){}
  public function  fireStudent($id){}
  public function  destroyStudent($id){}
  
}
