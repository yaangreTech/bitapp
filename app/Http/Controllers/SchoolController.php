<?php

namespace App\Http\Controllers;

use App\Models\Tu;
use Carbon\Carbon;
use App\Models\Year;
use App\Models\Classe;
use App\Models\Module;
use App\Models\Branche;
use App\Models\Semester;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Models\Semestre_name;
use Illuminate\Support\Facades\DB;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shool_departments=Departement::all();
       return view('pages.configures.school', compact('shool_departments'));
    }

    /** about departement*/
 
   public function getDepartments(){

    // dd('ddd');
       $departments=Departement::all();
       foreach($departments as $department){
           $department->classes;
           $department->branches;
       }

       return response()->json(
        $departments
       );

   }

    public function storeDepartment(Request $request)
    {
        $request->validate([
            'department'=>['required', 'string', 'max:255'],
            
        ]);
        $data = Departement::insert([
            'name'=>$request->department,
            'created_at'=>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);
        return response()->json($data);
    }

    public function updateDepartment(Request $request, $id)
    {
        $request->validate([
            'department'=>['required', 'string', 'max:255'],
        ]);

        $data = Departement::findOrFail($id);
     
        $data->name = $request->department;
        $data= $data->update();

        return response()->json($data);
    }

    public function deleteDepartment($id)
    {
        $data = Departement::findOrFail($id);
        $data= $data->delete();
        return response()->json($data);
    }


    public function destroyDepartment($id)
    {
        //
    }

    /** about Brancher*/
 
   public function getBranchs(){

    // dd('ddd');
       $departments=Departement::all();
       foreach($departments as $department){
           $department->branches;
           foreach($department->branches as $branch){
               $branch->classes;
           }
       }

       return response()->json(
        $departments
       );

   }

    public function storeBranch(Request $request)
    {
        $request->validate([
            'branch_name'=>['required', 'string', 'max:255'],
            'branch_departement'=>['required'],
        ]);
        $data = Branche::insert([
            'name'=>$request->branch_name,
            'departement_id'=>$request->branch_departement,
            'created_at'=>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);
        return response()->json($data);
    }

    public function updateBranch(Request $request, $id)
    {
        $request->validate([
            'branch_name'=>['required', 'string', 'max:255'],
            'branch_departement'=>['required'],
        ]);

        $data = Branche::findOrFail($id);
     
        $data->name = $request->branch_name;
        $data->departement_id = $request->branch_departement;
        $data= $data->update();

        return response()->json($data);
    }

    public function deleteBranch($id)
    {
        $data = Branche::findOrFail($id);
        $data= $data->delete();
        return response()->json($data);
    }


    public function destroyBranch($id)
    {
        //
    }


    

    /** about Semester*/
 
   public function getSemesters(){

       $semesters=Semestre_name::all();
       foreach($semesters as $semester){
      
    $semester->affectations;

       }

       return response()->json(
        $semesters
       );

   }

    public function storeSemester(Request $request)
    {
        $request->validate([
            'semester'=>['required', 'string', 'max:255'],
            
        ]);

        $data = Semestre_name::insert([
            'name'=>$request->semester,
            'created_at'=>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);
        return response()->json($data);
    }

    public function updateSemester(Request $request, $id)
    {
        $request->validate([
            'semester'=>['required', 'string', 'max:255'],
        ]);

        $data = Semestre_name::findOrFail($id);
     
        $data->name = $request->semester;
        $data= $data->update();

        return response()->json($data);
    }

    public function deleteSemester($id)
    {
        $data = Semestre_name::findOrFail($id);
        $data= $data->delete();
        return response()->json($data);
    }


    public function destroySemester($id)
    {
        //
    }


     /** about Classes*/
 
   public function getClassesOf($depID){

        
       $department=Departement::findOrFail($depID);
       $branches=$department->branches;

        $current_year=Year::all()->last();
       foreach($branches as $branch){
        $classes=$branch->classes;
        foreach($classes as $classe){
         $classe->semestre_names;
         $classe->semesters;
         $classe->tus;
         if($current_year!=null){
            $classe->inscriptions->where('year_id', $current_year->id);  
         }else{
            $classe->inscriptions;
         }
        }
       }
       return response()->json(
        $branches
       );

   }

    public function storeClasse(Request $request)
    {
        $request->validate([
            'classe_name'=>['required', 'string', 'max:255'],
            'classe_branch'=>['required', 'max:255'],
            'classe_level'=>['required', 'max:255'],
            'classe_semester_2'=>['required', 'max:255'],
            'classe_semester_1'=>['required',  'max:255'],
            
        ]);


       $data=DB::table('classes')->insertGetId(
           [
            'name'=>$request->classe_name,
            'branche_id'=>$request->classe_branch,
            'level'=>$request->classe_level,
            'created_at'=>Carbon::now(),
            'updated_at' =>Carbon::now(),
           ]
       );

        Semester::insert([
            'semestre_name_id'=>$request->classe_semester_1,
            'classe_id'=>$data,
            'created_at'=>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);

        Semester::insert([
            'semestre_name_id'=>$request->classe_semester_2,
            'classe_id'=>$data,
            'created_at'=>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);


        return response()->json($data>0?true:false);
    }

    public function updateClasse(Request $request, $id)
    {
        $request->validate([
            'classe_name'=>['required', 'string', 'max:255'],
            'classe_branch'=>['required', 'max:255'],
            'classe_level'=>['required', 'max:255'],
            'classe_semester_2'=>['required', 'max:255'],
            'classe_semester_1'=>['required',  'max:255'],
        ]);

        $data = Classe::findOrFail($id);
     
        $data->name = $request->classe_name;
        $data= $data->update();

        return response()->json($data);
    }

    public function deleteClasse($id)
    {
        $data = Classe::findOrFail($id);
        $data= $data->delete();
        return response()->json($data);
    }


    public function destroyClasse($id)
    {
        //
    }


       /** about TU*/
 
   public function getTuOf($classID){

    // dd('ddd');
       $tu_body=Array();
       $classe=Classe::findOrFail($classID);
       $tus=$classe->tus;
       foreach($tus as $tu){
      
    //  $modulu['semesterID']=$modulu->semester->id;
    //  $semester=$modulu->semester;
    $tu->semester->semestre_name->name;
    $tu->modulus;

        //   array_unshift($modulus_body,$modulu);
       }

       return response()->json(
        $tus
       );

   }

    public function storeTu(Request $request)
    {
        $request->validate([
            'TU_name'=>['required', 'string', 'max:255'],
            'TU_classe'=>['required',  'max:255'],
            'TU_semester'=>['required',  'max:255'],
        ]);

        $data = Tu::insert([
            'name'=>$request->TU_name,
            'semester_id'=>$request->TU_semester,
            'created_at'=>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);

   

        return response()->json($data);
    }

    public function updateTu(Request $request, $id)
    {
        $request->validate([
            'TU_name'=>['required', 'string', 'max:255'],
            'TU_classe'=>['required',  'max:255'],
            'TU_semester'=>['required',  'max:255'],
        ]);

        $data = Tu::findOrFail($id);
     
        $data->name = $request->TU_name;
        $data->semester_id=$request->TU_semester;
        $data= $data->update();

        return response()->json($data);
    }

    public function deleteTu($id)
    {
        $data = Tu::findOrFail($id);
        $data= $data->delete();
        return response()->json($data);
    }


    public function destroyTu($id)
    {
        //
    }

    public function bindSemestersOf($classID){
      
        $classe = Classe::findOrFail($classID);
        $semesters=$classe->semesters;
        foreach($semesters as $semester){
           $semester->semestre_name;
        }

        return response()->json($semesters);

    }


         /** about Modulus*/
 
   public function getModulusOf($classID){

    // dd('ddd');
    //    $modulus_body=Array();
       $classe=Classe::findOrFail($classID);
       $tus=$classe->tus;
       foreach($tus as $tu){
    $tu->modulus;
    $tu->semester->semestre_name->name;
       }

       return response()->json(
        $tus
       );

   }

    public function storeModulus(Request $request)
    {
        $request->validate([
            'module_name'=>['required', 'string', 'max:255'],
            'modulus_credict'=>['required', 'max:255'],
            'modulus_hours'=>['required', 'max:255'],
            'modulus_classe'=>['required',  'max:255'],
            'modulus_TU'=>['required',  'max:255'],
        ]);

        $data = Module::insert([
            'name'=>$request->module_name,
            'credict'=>$request->modulus_credict,
            'tu_id'=>$request->modulus_TU,
            'heure'=>$request->modulus_hours,
            'created_at'=>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);

   

        return response()->json($data);
    }

    public function updateModulus(Request $request, $id)
    {
        $request->validate([
            'module_name'=>['required', 'string', 'max:255'],
            'modulus_credict'=>['required', 'max:255'],
            'modulus_hours'=>['required', 'max:255'],
            'modulus_classe'=>['required',  'max:255'],
            'modulus_TU'=>['required',  'max:255'],
        ]);

        $data = Module::findOrFail($id);
     
        $data->name = $request->module_name;
        $data->credict=$request->modulus_credict;
        $data->tu_id=$request->modulus_TU;
        $data->heure=$request->modulus_hours;
        $data= $data->update();

        return response()->json($data);
    }

    public function deleteModulus($id)
    {
        $data = Module::findOrFail($id);
        $data= $data->delete();
        return response()->json($data);
    }


    public function destroyModulus($id)
    {
        //
    }

    public function bindTuOf($classID){
        $classe = Classe::findOrFail($classID);
        $semesters=$classe->semesters;
        foreach($semesters as $semester){
           $semester->semestre_name;
           $semester->tus;
        }

        return response()->json($semesters);

    }


    
}
