<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Year;
use App\Models\Level;
use App\Models\Parente;
use App\Models\Student;
use App\Models\Conforme;
use App\Models\Sessione;
use App\Models\Promotion;
use App\Models\Departement;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    //
    public function index()
    {
        return view('pages.students.students');
    }

    public function displayForm()
    {
        $departments = Departement::all();
        if (Auth::user()->right->title == 'isHd') {
            $departments = Departement::where(
                'id',
                Auth::user()->manage->departement_id
            )->get();
        }
        $promotions = Promotion::orderBy('id', 'DESC')->get();

        foreach ($departments as $department) {
            $department->classes;
        }

        return view(
            'pages.students.students-form',
            compact(['departments', 'promotions'])
        );
    }
    
    public function reinscription_index()
    {
        $departments = Departement::all();
        if (Auth::user()->right->title == 'isHd') {
            $departments = Departement::where(
                'id',
                Auth::user()->manage->departement_id
            )->get();
        }
        return view(
            'pages.students.reinscription-form',
            compact(['departments'])
        );
    }

    public function verifyMatricule($matricule)
    {
        $data = false;
        $student = Student::where('matricule', $matricule)->first();
        $student != null && ($data = true);

        return response()->json($data);
    }

    public function getStudentsOf($yearID, $classID)
    {
        // return view('pages.students.students');
        $inscriptions = Inscription::all()
            ->where('year_id', $yearID)
            ->where('level_id', $classID);
        foreach ($inscriptions as $inscription) {
            $inscription->student->parent;
        }
        $level=Level::findOrFail($classID);
        $level->branche->departement;
        return response()->json([
            'page_title'=> $level,
            'inscriptions'=>$inscriptions
        ]);
    }

    public function viewStudentsInfo($inscID)
    {
        // return view('pages.students.students');
        $inscription = Inscription::findOrFail($inscID);
        $inscription->student->parent;
        $inscription->level;
        $inscription->promotion;
        // $inscription->parent;
        return response()->json($inscription);
    }

    public function storeStudent(Request $request)
    {
        $current_year = Year::all()->last();

        $request->validate([
            'studentID' => ['required'],
            'studentFirstName' => ['required'],
            'studentLastName' => ['required'],
            'studentBirthDate' => ['required'],
            'studentPhone' => ['required'],
            'studentEmail' => ['required'],
            'studentGender' => ['required'],
            'studentClasse' => ['required'],
            'studentPromotion' => ['required'],
            'studentBirthPlace'=> ['required'],
            // 'studentParentFirstName' => ['required'],
            // 'studentParentLastName' => ['required'],
            // 'studentParentPhone' => ['required'],
            // 'studentParentProfession' => ['required'],
            // 'studentParentType' => ['required'],
            // 'year_id'=>['required'],
        ]);

        $student_id = Student::insertGetId([
            'matricule' => $request->studentID,
            'first_name' => ucwords($request->studentFirstName),
            'Last_name' => ucwords($request->studentLastName),
            'gender' => $request->studentGender,
            'phone' => $request->studentPhone,
            'birth_date' => $request->studentBirthDate,
            'birth_place'=>$request->studentBirthPlace,
            'email' => $request->studentEmail,
            'promotion_id' => $request->studentPromotion,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $parent = Parente::insert([
            'student_id' => $student_id,
            'first_name' => ucwords($request->studentParentFirstName),
            'Last_name' => ucwords($request->studentParentLastName),
            'type' => $request->studentParentType,
            'profession' => $request->studentParentProfession,
            'phone' => $request->studentParentPhone,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $inscription = Inscription::insert([
            'promotion_id' => $request->studentPromotion,
            'student_id' => $student_id,
            'level_id' => $request->studentClasse,
            'year_id' => $current_year->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return response()->json($inscription);
    }
    public function updateStudent(Request $request, $id)
    {

        $request->validate([
            'studentID' => ['required'],
            'studentFirstName' => ['required'],
            'studentLastName' => ['required'],
            'studentBirthDate' => ['required'],
            // 'studentBirthPlace'=> ['required'],
            'studentPhone' => ['required'],
            'studentEmail' => ['required'],
            // 'studentParentFirstName' => ['required'],
            // 'studentParentLastName' => ['required'],
            // 'studentParentPhone' => ['required'],
            // 'studentParentProfession' => ['required'],
            // 'studentParentType' => ['required'],
        ]);


        $inscription = Inscription::findOrFail($id);
        $student = $inscription->student;
       
        $student->matricule = $request->studentID;
        $student->first_name = $request->studentFirstName;
        $student->Last_name = $request->studentLastName;
        $student->birth_date = $request->studentBirthDate;
        // $student->birth_place = $request->studentBirthPlace;
        $student->phone = $request->studentPhone;
        $student->email = $request->studentEmail;
        $student = $student->update();

        $parent = $inscription->student->parent;
        $parent->first_name = $request->studentParentFirstName;
        $parent->Last_name = $request->studentParentLastName;
        $parent->phone = $request->studentParentPhone;
        $parent->profession = $request->studentParentProfession;
        $parent->type = $request->studentParentType;
        $parent = $parent->update();
        return response()->json($student && $parent);
    }
    public function deleteStudent($id)
    {
        $inscription = Inscription::findOrFail($id);
        $inscription = $inscription->delete();
        return response()->json($inscription);
    }

    public function disable_tudent($id)
    {
        $inscription = Inscription::findOrFail($id);
        $inscription->status = 'Give Up';
        $inscription = $inscription->update();
        return response()->json($inscription);
    }

    public function enable_Student($id)
    {
        $inscription = Inscription::findOrFail($id);
        $inscription->status = 'active';
        $inscription = $inscription->update();
        return response()->json($inscription);
    }
    public function destroyStudent($id)
    {
    }

    function getDestination($lastYearID, $initialClassID)
    {
        $lastYear = Year::findOrFail($lastYearID);
        $initialClass = Level::findOrFail($initialClassID);
        
        $branche = $initialClass->branche;
        $destination_classes = Level::where('branche_id', $branche->id)
            ->where('label', '>=', $initialClass->label)
            ->orderBy('label', 'ASC')
            ->take(2)
            ->get();
            // dd($destination_classes);
        $consernedStudents = $this->getConsernedStudents(
            $lastYearID,
            $initialClassID
        );

        return response()->json([
            'destination_classes' => $destination_classes,
            'consernedStudents' => $consernedStudents,
        ]);
    }

    function getConsernedStudents($lastYear_id, $initialClass_id)
    {
        $lastYear = Year::findOrFail($lastYear_id);
        $initialClass = Level::findOrFail($initialClass_id);
        $current_year = Year::all()->last();
        $head_element = [];
        $last_inscriptions = $initialClass->inscriptions
            ->where('year_id', $lastYear_id)
            ->whereNotIn(
                'student_id',
                Inscription::where('year_id', $current_year->id)
                    ->select('student_id')
                    ->pluck('student_id')
            );
        //  loup inscripotion
        foreach ($last_inscriptions as $inscription) {
            $conforme = new Conforme();
            $inscription->student;
            $semesters = $initialClass->semesters;
            $t_credit = 0;
            $t_n_ponderer = 0;
            $status = 'Pass';
            $average = 0;
            $average_s = 0;
            $year_semester = [];
            $head_element = [];
            foreach ($semesters as $semester) {
                $semester->semestre_name;
                array_push($head_element, $semester);
                $tus = $semester->tus;
                $s_average = 0;
                $s_credit = 0;
                $s_ponderer = 0;
                foreach ($tus as $tu) {
                    $modules = $tu->modulus;
                    $tu_average = 0;
                    $tu_credit = 0;
                    $tu_ponderer = 0;
                    foreach ($modules as $mod) {
                        $sessione = new Sessione();
                        $tests = $mod->tests
                            ->where('year_id', $lastYear_id)
                            ->where('type', 'normal');
                        $note = 0;
                        if (
                            $sessione->has_Session_mark(
                                $mod->id,
                                $inscription->id
                            )
                        ) {
                            $tests = $mod->tests
                                ->where('year_id', $inscription->year_id)
                                ->where('type', 'session');
                        }
                        foreach ($tests as $test) {
                            $mark = $test->markOf($inscription->id);
                            if ($mark != null) {
                                $mark = $mark->getAttributes();
                                $note += ($mark['value'] * $test->ratio) / 100;
                            }
                        }
                        $mod = $mod->getAttributes();
                        $tu_credit += $mod['credict'];
                        $tu_ponderer += $note * $mod['credict'];
                    }
                    $s_ponderer += $tu_ponderer;
                    $s_credit += $tu_credit;
                    $tu_credit > 0
                        ? ($tu_average = round($tu_ponderer / $tu_credit, 2))
                        : ($tu_average = $tu_ponderer);

                    if ($tu_average < 8) {
                        $status = 'Fail';
                    }
                }
                if ($s_credit > 0) {
                    $average += $s_ponderer / $s_credit;
                    $semester['s_n_average'] = round(
                        $s_ponderer / $s_credit,
                        2
                    );
                } else {
                    $average += $s_ponderer;
                    $semester['s_n_average'] = round($s_ponderer, 2);
                }

                if ($semester['s_n_average'] < 10) {
                    $status = 'Fail';
                }

                $t_credit += $s_credit;

                array_push($year_semester, $semester->getAttributes());
            }
            if ($t_credit > 0) {
                $average = round($average / 2, 2);
            }

            $inscription['conforme'] = $conforme->conformeOf($average);
            $inscription['t_n_average'] = $average;
            $inscription['t_n_status'] = $status;
            $inscription['year_semesters'] = $year_semester;
            // $inscription=$inscription->getAttributes();
        }

        return [
            'head_element' => $head_element,
            'inscriptions' => $last_inscriptions,
        ];
    }

    public function reinscriptStudent(Request $request)
    {
        $data = false;
        $current_year = Year::all()->last();
        $request->validate([
            // 'initial_class'=>['required'],
            'students_ids' => ['required'],
            'destination_class' => ['required'],
        ]);

        $students_ids_list = explode('_', $request->students_ids);

        foreach ($students_ids_list as $student_id) {
            $previousInsc = Inscription::all()
                ->where('student_id', $student_id)
                ->last();

            $data = Inscription::insert([
                'promotion_id' => $previousInsc->promotion_id,
                'student_id' => $student_id,
                'level_id' => $request->destination_class,
                'year_id' => $current_year->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        return $data;
    }

    public function end_cyle_index()
    {
        $departments = Departement::all();
        if (Auth::user()->right->title == 'isHd') {
            $departments = Departement::where(
                'id',
                Auth::user()->manage->departement_id
            )->get();
        }
        return view('pages.students.end_cycle-form', compact(['departments']));
    }

    public function getPromotions($currentYearID, $l3classID)
    {
        $years_promotions = [];
        $firstInscription = Inscription::all()
            ->where('level_id', $l3classID)
            ->where('status','!=','ended')
            ->first();
        $lastInscription = Inscription::all()
            ->where('level_id', $l3classID)
            ->where('status','!=','ended')
            ->last();
        if ($lastInscription != null) {
            $years_promotions = Year::with('promotion')
                ->wherebetween('id', [
                    $firstInscription->year_id,
                    $lastInscription->year_id,
                ])
                ->get();
        }
        //dd($years_promotions);
        return response()->json($years_promotions);
    }

    public function getStudentsToEnd($yearID, $classID)
    {
        $classe = Level::findOrFail($classID);
        $branche = $classe->branche;

      
         $head_elements=$classe->semesters;

        $inscriptions = $classe->inscriptions->where('year_id', $yearID)->where('status','!=','ended');
// dd($inscriptions);
        foreach ($inscriptions as $inscription) {
            $conforme = new Conforme();
            $inscription->student;
            $semesters = $classe->semesters;
            $t_credit = 0;
            $t_n_ponderer = 0;
            $status = 'Pass';
            $average = 0;
            $average_s = 0;
            $year_semester = [];
            $head_element = [];
            foreach ($semesters as $semester) {
                // $semester->semestre_name;
                array_push($head_element, $semester);
                $tus = $semester->tus;
                $s_average = 0;
                $s_credit = 0;
                $s_ponderer = 0;
                foreach ($tus as $tu) {
                    $modules = $tu->modulus;
                    $tu_average = 0;
                    $tu_credit = 0;
                    $tu_ponderer = 0;
                    foreach ($modules as $mod) {
                        $sessione = new Sessione();
                        $tests = $mod->tests
                            ->where('year_id', $yearID)
                            ->where('type', 'normal');
                        $note = 0;
                        if (
                            $sessione->has_Session_mark(
                                $mod->id,
                                $inscription->id
                            )
                        ) {
                            $tests = $mod->tests
                                ->where('year_id', $inscription->year_id)
                                ->where('type', 'session');
                        }
                        foreach ($tests as $test) {
                            $mark = $test->markOf($inscription->id);
                            if ($mark != null) {
                                $mark = $mark->getAttributes();
                                $note += ($mark['value'] * $test->ratio) / 100;
                            }
                        }
                        $mod = $mod->getAttributes();
                        $tu_credit += $mod['credict'];
                        $tu_ponderer += $note * $mod['credict'];
                    }
                    $s_ponderer += $tu_ponderer;
                    $s_credit += $tu_credit;
                    $tu_credit > 0
                        ? ($tu_average = round($tu_ponderer / $tu_credit, 2))
                        : ($tu_average = $tu_ponderer);

                    if ($tu_average < 8) {
                        $status = 'Fail';
                    }
                }
                if ($s_credit > 0) {
                    $average += $s_ponderer / $s_credit;
                    $semester['s_n_average'] = round(
                        $s_ponderer / $s_credit,
                        2
                    );
                } else {
                    $average += $s_ponderer;
                    $semester['s_n_average'] = round($s_ponderer, 2);
                }

                if ($semester['s_n_average'] < 10) {
                    $status = 'Fail';
                }

                $t_credit += $s_credit;

                array_push($year_semester, $semester->getAttributes());
            }
            if ($t_credit > 0) {
                $average = round($average / 2, 2);
            }

            $inscription['conforme'] = $conforme->conformeOf($average);
            $inscription['t_n_average'] = $average;
            $inscription['t_n_status'] = $status;
            $inscription['year_semesters'] = $year_semester;
            // $inscription=$inscription->getAttributes();
        }

        return response()->json([
            'head_element' => $head_elements,
            'inscriptions' => $inscriptions,
        ]);
    }


    public function end_Students_cycle(Request $request){
        $request->validate([
            'students_ids' => ['required'],
        ]);
        $data=true;
        $students_ids_list = explode('_', $request->students_ids);
        foreach ($students_ids_list as $student_id) {
            $student = Student::find($student_id);
            $student->status = 'ended';
            $student->update();
            $inscription=$student->inscriptions->last();
            $inscription->status = 'ended';
            $inscription->update();
            if($student==false){$data=false;}
        }

        return response()->json($data);
    }


    // public function getStudentsToEnd($yearID, $classID)
    // {
    //     $classe = Level::findOrFail($classID);
    //     $branche = $classe->branche;

    //     $semesters = $branche->semesters;
    //     // $thead_elements=['first'=>$branche->classes, 'second'=>$branche->semesters->load('semestre_name')];

    //     $inscriptions = $classe->inscriptions->where('year_id', $yearID);

    //     foreach ($inscriptions as $inscription) {
    //         $conforme = new Conforme();
    //         $inscription->student;
    //         $semesters = $branche->semesters;
    //         $t_credit = 0;
    //         $t_n_ponderer = 0;
    //         $status = 'Pass';
    //         $average = 0;
    //         $average_s = 0;
    //         $year_semester = [];
    //         $head_element = [];
    //         foreach ($semesters as $semester) {
    //             $semester->semestre_name;
    //             array_push($head_element, $semester);
    //             $tus = $semester->tus;
    //             $s_average = 0;
    //             $s_credit = 0;
    //             $s_ponderer = 0;
    //             foreach ($tus as $tu) {
    //                 $modules = $tu->modulus;
    //                 $tu_average = 0;
    //                 $tu_credit = 0;
    //                 $tu_ponderer = 0;
    //                 foreach ($modules as $mod) {
    //                     $sessione = new Sessione();
    //                     $tests = $mod->tests
    //                         ->where('year_id', $lastYear_id)
    //                         ->where('type', 'normal');
    //                     $note = 0;
    //                     if (
    //                         $sessione->has_Session_mark(
    //                             $mod->id,
    //                             $inscription->id
    //                         )
    //                     ) {
    //                         $tests = $mod->tests
    //                             ->where('year_id', $inscription->year_id)
    //                             ->where('type', 'session');
    //                     }
    //                     foreach ($tests as $test) {
    //                         $mark = $test->markOf($inscription->id);
    //                         if ($mark != null) {
    //                             $mark = $mark->getAttributes();
    //                             $note += ($mark['value'] * $test->ratio) / 100;
    //                         }
    //                     }
    //                     $mod = $mod->getAttributes();
    //                     $tu_credit += $mod['credict'];
    //                     $tu_ponderer += $note * $mod['credict'];
    //                 }
    //                 $s_ponderer += $tu_ponderer;
    //                 $s_credit += $tu_credit;
    //                 $tu_credit > 0
    //                     ? ($tu_average = round($tu_ponderer / $tu_credit, 2))
    //                     : ($tu_average = $tu_ponderer);

    //                 if ($tu_average < 8) {
    //                     $status = 'Fail';
    //                 }
    //             }
    //             if ($s_credit > 0) {
    //                 $average += $s_ponderer / $s_credit;
    //                 $semester['s_n_average'] = round(
    //                     $s_ponderer / $s_credit,
    //                     2
    //                 );
    //             } else {
    //                 $average += $s_ponderer;
    //                 $semester['s_n_average'] = round($s_ponderer, 2);
    //             }

    //             if ($semester['s_n_average'] < 10) {
    //                 $status = 'Fail';
    //             }

    //             $t_credit += $s_credit;

    //             array_push($year_semester, $semester->getAttributes());
    //         }
    //         if ($t_credit > 0) {
    //             $average = round($average / 2, 2);
    //         }

    //         $inscription['conforme'] = $conforme->conformeOf($average);
    //         $inscription['t_n_average'] = $average;
    //         $inscription['t_n_status'] = $status;
    //         $inscription['year_semesters'] = $year_semester;
    //         // $inscription=$inscription->getAttributes();
    //     }

    //     return response()->json($thead_elements);
    // }
}
