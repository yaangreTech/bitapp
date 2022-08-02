<?php

namespace App\Http\Controllers;

use App\Models\Tu;
use Carbon\Carbon;
use App\Models\Year;
use App\Models\Level;
use App\Models\Manage;
use App\Models\Module;
use App\Models\Branche;
use App\Models\Semester;
use App\Models\Departement;
use App\Models\Level_format;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $shool_departments = Departement::all();
    return view('pages.configures.school' /*,compact('shool_departments')*/);
    }

    /** about departement*/

    public function getDepartments()
    {
        // dd('ddd');
        $departments = Departement::all();
        if(Auth::user()->right->title == 'isHd'){
            $departments = Departement::where('id', '=', Manage::where('user_id', '=',Auth::user()->id)->orderBy('id','desc')->first()->departement_id)->get();
        }
        foreach ($departments as $department) {
            $department->levels;
            $department->branches;
            foreach ($department->branches as $branch) {
                $branch->levels->load('semesters');
            }
            $department->heads;
        }

        return response()->json($departments);
    }

    public function storeDepartment(Request $request)
    {
        $request->validate([
            'department' => ['required', 'string', 'max:255'],
            'dep_label'=>['required', 'string']
        ]);
        $data = Departement::insert([
            'name' => $request->department,
            'label'=>$request->dep_label,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return response()->json($data);
    }

    public function updateDepartment(Request $request, $id)
    {
        $request->validate([
            'department' => ['required', 'string', 'max:255'],
            'dep_label'=>['required', 'string']
        ]);

        $data = Departement::findOrFail($id);

        $data->name = $request->department;
        $data->label=$request->dep_label;
        $data = $data->update();

        return response()->json($data);
    }

    public function deleteDepartment($id)
    {
        $data = Departement::findOrFail($id);
        $data = $data->delete();
        return response()->json($data);
    }

    public function destroyDepartment($id)
    {
        //
    }

    /** about Brancher*/

    public function getBranchs()
    {
        // dd('ddd');
        $departments = Departement::all();
        if(Auth::user()->right->title == 'isHd'){
            $departments = Departement::where('id', '=', Manage::where('user_id', '=',Auth::user()->id)->orderBy('id','desc')->first()->departement_id)->get();
        }
        foreach ($departments as $department) {
            $department->branches;
            foreach ($department->branches as $branch) {
                $branch->levels;
            }
        }

        return response()->json($departments);
    }

    public function storeBranch(Request $request)
    {
        $request->validate([
            'branch_name' => ['required', 'string', 'max:255'],
            'branch_departement' => ['required'],
            'branch_i_level'=> ['required'],
            'branch_f_level'=> ['required'],
            // 'levels_range'=>['required'],

        ]);
        $data=true;
        $optionID = Branche::insertGetId([
            'name' => $request->branch_name,
            'departement_id' => $request->branch_departement,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        // dd(str_replace('_',' ',explode('x',$request->levels_range)[0]));
        // $initial_format=Level_format::all()->where('label', explode('x',$request->levels_range)[0])->first();
      
        // $final_format=Level_format::all()->where('label', explode('x',$request->levels_range)[1])->first();
        
        
        $levels_formats=Level_format::all()->where('id','>=',$request->branch_i_level)->where('id','<=',$request->branch_f_level);
        
        foreach ($levels_formats as $lf){
            $levelID=Level::insertGetId([
                'name' =>  $lf->name,
                'label' =>  $lf->label,
                'cycle' =>  $lf->cycle,
                'branche_id'=> $optionID
            ]);
            foreach ($lf->semester_formats as $sf){
                $data=Semester::insert([
                    'name' => $sf->name,
                    'label' => $sf->label,
                    'level_id' => $levelID,
                ]);
            }
        }
        return response()->json($data);
    }

    public function updateBranch(Request $request, $id)
    {
        $request->validate([
            'branch_name' => ['required', 'string', 'max:255'],
            'branch_departement' => ['required'],
            'branch_i_level'=> ['required'],
            'branch_f_level'=> ['required'],
        ]);
        $data=false;
        $levels_formats=Level_format::all()->where('id','>=',$request->branch_i_level)->where('id','<=',$request->branch_f_level);
        $branch = Branche::findOrFail($id);

        $branch->name = $request->branch_name;
        $branch->departement_id = $request->branch_departement;
        $data = $branch->update();
        $levels=$branch->levels;

        $levelAsSuppimers=$branch->levels->whereNotIn('name', $levels_formats->pluck('name'));

        $levelAsAjouters=$levels_formats->whereNotIn('name', $levels->pluck('name'));
       
        foreach ($levelAsAjouters as $levelAsAjouter){
          
            $levelID=Level::insertGetId([
                'name' =>  $levelAsAjouter->name,
                'label' =>  $levelAsAjouter->label,
                'cycle' =>  $levelAsAjouter->cycle,
                'branche_id'=> $branch->id
            ]);
            foreach ($levelAsAjouter->semester_formats as $sf){
                $data=Semester::insert([
                    'name' => $sf->name,
                    'label' => $sf->label,
                    'level_id' => $levelID,
                ]);
            }
        }

        foreach ($levelAsSuppimers as $levelAsSuppimer){
            $levelAsSuppimer->delete();
        }
        return response()->json($data);
    }

    public function bind_levels_of( $initalID){
        $levels_formats=Level_format::all()->where('id','>=',$initalID);
        return response()->json($levels_formats);
    }

    public function deleteBranch($id)
    {
        $data = Branche::findOrFail($id);
        $data = $data->delete();
        return response()->json($data);
    }

    public function destroyBranch($id)
    {
        //
    }

    /** about Semester*/

    public function getSemesters()
    {
        $semesters = Semester::all();
        // foreach ($semesters as $semester) {
        //     $semester->affectations;
        // }

        return response()->json($semesters);
    }

    public function storeSemester(Request $request)
    {
        $request->validate([
            'semester' => ['required', 'string', 'max:255'],
        ]);

        $data = Semester::insert([
            'name' => $request->semester,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return response()->json($data);
    }

    public function updateSemester(Request $request, $id)
    {
        $request->validate([
            'semester' => ['required', 'string', 'max:255'],
        ]);

        $data = Semester::findOrFail($id);

        $data->name = $request->semester;
        $data = $data->update();

        return response()->json($data);
    }

    public function deleteSemester($id)
    {
        $data = Semester::findOrFail($id);
        $data = $data->delete();
        return response()->json($data);
    }

    public function destroySemester($id)
    {
        //
    }

    /** about Classes*/

    public function getClassesOf($depID)
    {
        $department = Departement::findOrFail($depID);
        $branches = $department->branches;

        $current_year = Year::all()->last();
        foreach ($branches as $branch) {
            $levels = $branch->levels;
            foreach ($levels as $level) {
                // $classe->semestre_names;
                $levels->semesters;//->load("semestre_name");
                $levels->tus;
                if ($current_year != null) {
                    $level->inscriptions->where('year_id', $current_year->id);
                } else {
                    $level->inscriptions;
                }
            }
        }
        return response()->json($branches);
    }

    public function storeClasse(Request $request)
    {
        $request->validate([
            'classe_name' => ['required', 'string', 'max:255'],
            'classe_branch' => ['required', 'max:255'],
            'classe_level' => ['required', 'max:255'],
            'classe_semester_2' => ['required', 'max:255'],
            'classe_semester_1' => ['required', 'max:255'],
        ]);

        $data = DB::table('classes')->insertGetId([
            'name' => $request->classe_name,
            'branche_id' => $request->classe_branch,
            'level' => $request->classe_level,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Semester::insert([
            'semestre_name_id' => $request->classe_semester_1,
            'classe_id' => $data,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Semester::insert([
            'semestre_name_id' => $request->classe_semester_2,
            'classe_id' => $data,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return response()->json($data > 0 ? true : false);
    }

    public function updateClasse(Request $request, $id)
    {
        $request->validate([
            'classe_name' => ['required', 'string', 'max:255'],
            'classe_branch' => ['required', 'max:255'],
            'classe_level' => ['required', 'max:255'],
            'classe_semester_2' => ['required', 'max:255'],
            'classe_semester_1' => ['required', 'max:255'],
        ]);

        $data = Level::findOrFail($id);
         $semesterN1=$data->semesters->first();
         $semesterN2=$data->semesters->last();

         $semesterN1->semestre_name_id = $request->classe_semester_1;
         $semesterN1->update();
         $semesterN2->semestre_name_id  = $request->classe_semester_2;
         $semesterN2->update();

        $data->name = $request->classe_name;
        $data = $data->update();

        return response()->json($data);
    }

    public function deleteClasse($id)
    {
        $data = Level::findOrFail($id);
        $data = $data->delete();
        return response()->json($data);
    }

    public function destroyClasse($id)
    {
        //
    }

    /** about TU*/

    public function getTuOf($semesterID)
    {
        // dd('ddd');
        $tu_body = [];
        $semester = Semester::findOrFail($semesterID);
        $semester->level->branche;
        $semester->tus->load(['modulus','semester']);
        

        return response()->json($semester);
    }

    public function storeTu(Request $request)
    {
     
        $request->validate([
            'TU_name' => ['required', 'string', 'max:255'],
            'TU_semester' => ['required', 'max:255'],
            'TU_checker' => ['required'],
            'TU_code'=> ['required', 'string', 'max:255'],
        ]);

        // dd($request);
        $data=false;

        
        $semester= Semester::findOrFail($request->TU_semester);

        $tuID=Tu::insertGetId([
            'semester_id'=>$semester->id,
            'code'=>$request->TU_code,
            'name'=>$request->TU_name
        ]);
        
        $ecus=json_decode($request->TU_checker);
        foreach($ecus as $ecu){
            $data=Module::insert([
                'tu_id' =>$tuID,
                'name'=>$ecu->module_name,
                'credict' =>$ecu->modulus_credict,
                'heure' =>$ecu->modulus_hours,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        
        return response()->json($data);
    }

    public function updateTu(Request $request, $id)
    {
        $request->validate([
            'TU_name' => ['required', 'string', 'max:255'],
            'TU_code'=> ['required', 'string', 'max:255','unique:tus'],
            'TU_checker' => ['required'],
        ]);

        $data=false;

        $tu = Tu::findOrFail($id);

        $tu->name=$request->TU_name;
        $tu->code=$request->TU_code;
        $data=$tu->update();

        $ecus=json_decode($request->TU_checker);
    
        $modulus_ids= $tu->modulus->pluck('id')->toArray();

        // array_shift( $modulus_ids,37);

        foreach ($ecus as $ecu){
            if($ecu->id!=0){
                $modulu=Module::findOrFail($ecu->id);
                $modulu->name=$ecu->module_name;
                $modulu->heure=$ecu->modulus_hours;
                $modulu->credict=$ecu->modulus_credict;
                $modulu->update();
                $modulus_ids=array_diff($modulus_ids, array($ecu->id)); 
            }else{
                Module::insert([
                    'tu_id' =>$id,
                    'name'=>$ecu->module_name,
                    'credict' =>$ecu->modulus_credict,
                    'heure' =>$ecu->modulus_hours,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

        foreach ($modulus_ids as $modulus_id){
            $moduluTodelete=Module::findOrFail($modulus_id);
            $moduluTodelete->delete();
        }


        return response()->json($data);
    }

    public function deleteTu($id)
    {
        $data = Tu::findOrFail($id);
        $data = $data->delete();
        return response()->json($data);
    }

    public function destroyTu($id)
    {
        //
    }

    public function bindSemestersOf($classID)
    {
        $classe = Level::findOrFail($classID);
        $semesters = $classe->semesters;
        foreach ($semesters as $semester) {
            $semester->semestre_name;
        }

        return response()->json($semesters);
    }

    /** about Modulus*/

    public function getModulusOf($classID)
    {
        // dd('ddd');
        //    $modulus_body=Array();
        $classe = Level::findOrFail($classID);
        $tus = $classe->tus;
        foreach ($tus as $tu) {
            $tu->modulus;
            $tu->semester->semestre_name->name;
        }

        return response()->json($tus);
    }

    public function storeModulus(Request $request,$tuID)
    {
        $request->validate([
            'module_name' => ['required', 'string', 'max:255'],
            'modulus_credict' => ['required', 'max:255'],
            'modulus_hours' => ['required', 'max:255'],
        ]);

        $data = Module::insert([
            'name' => $request->module_name,
            'credict' => $request->modulus_credict,
            'tu_id' => $tuID,
            'heure' => $request->modulus_hours,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return response()->json($data);
    }

    public function updateModulus(Request $request, $id)
    {
        $request->validate([
            'module_name' => ['required', 'string', 'max:255'],
            'modulus_credict' => ['required', 'max:255'],
            'modulus_hours' => ['required', 'max:255'],
        ]);

        $data = Module::findOrFail($id);

        $data->name = $request->module_name;
        $data->credict = $request->modulus_credict;
        $data->heure = $request->modulus_hours;
        $data = $data->update();

        return response()->json($data);
    }

    public function deleteModulus($id)
    {
        $data = Module::findOrFail($id);
        $data = $data->delete();
        return response()->json($data);
    }

    public function destroyModulus($id)
    {
        //
    }

    public function bindTuOf($classID)
    {
        $classe = Level::findOrFail($classID);
        $semesters = $classe->semesters;
        foreach ($semesters as $semester) {
            $semester->semestre_name;
            $semester->tus;
        }

        return response()->json($semesters);
    }
}
