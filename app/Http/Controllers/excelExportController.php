<?php

namespace App\Http\Controllers;

use ZipArchive;
use App\Models\Year;
use App\Models\Level;
use App\Models\Semester;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\AverageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MarksInputController;

require_once(app_path('CustomPhp/ExcelPhp/gradeReport.php'));
require_once(app_path('CustomPhp/ExcelPhp/semesterReport.php'));
require_once(app_path('CustomPhp/ExcelPhp/semesterReportRedoExams.php'));
require_once(app_path('CustomPhp/ExcelPhp/studentsList.php'));
require_once(app_path('CustomPhp/ExcelPhp/subjectReport.php'));
require_once(app_path('CustomPhp/customHelpers.php'));
require_once(app_path('CustomPhp\ExcelPhp\proclamation.php'));

class excelExportController extends Controller
{






    public function genGrade()
    {
        $markJson = app_path('CustomPhp/ExcelPhp/Examples_excel');

        $file = fopen($markJson . '/marks.json', 'r');
        $data = json_decode(fread($file, filesize(app_path('CustomPhp/ExcelPhp/Examples_excel/marks.json'))), true);
        fclose($file);
        // preparation des donnees
        $dir = storage_path('excelFiles');
        $academicDirector = "Dr. Bawindsom Marcel KEBRE";
        $academicDirectorTitle = "Maître de Conférences (Lecturer)";
        $class = "Computer Science";
        $semester = 1;
        $academicYear = "2021-2022";
        $studentSurname = "Emmanuel";
        $studentName = "Yaro";
        $studentId = "bs0001";
        $graduationYear = "2022";

        /*cet fichier va generer le fichier excel du gradeRepport
        * au cas ou on veut generer plusieurs il faut juste mettre
        * la fonction GradeReport dans une boucle.
        */
        GradeReport($data, $studentId, $studentName . $studentId, $studentSurname, $class, $semester, $academicYear, $graduationYear, $academicDirector, $academicDirectorTitle, $dir . DIRECTORY_SEPARATOR);

        // Lorsque le(s) fichies sont generes  la fonction zipAndDownload
        // peut etre appelee pour compresser et telechearger
        zipAndDownload($academicYear . "_gradeReport.zip");
    }

    public function genSemester($yearID, $semesterID, $isWithSession,$before_reclaim)
    {
        
        // $semesterJson = app_path('CustomPhp/ExcelPhp/Examples_excel');

        // $file = fopen($semesterJson . '/studentData.json', 'r');
        // $student_data = json_decode(fread($file, filesize($semesterJson . '/studentData.json')), true);
        // $file = fopen($semesterJson . '/headers.json', 'r');
        // $headers = json_decode(fread($file, filesize($semesterJson . '/headers.json')), true);
        $jsons=[];
         // dd( $jsons);
         $student_data = [];
         $session_student_data = [];
         $pv_data = [];
         $cp = 0;
 
        $semesterAverages = new AverageController();
        if ($isWithSession == 'true') {
          
            $jsons = $semesterAverages->getAverage_with_session_Of($yearID, $semesterID);
            $jsons = json_decode($jsons->getContent(), true);

            foreach ($jsons['inscriptions'] as $inscription) {
                if($inscription['did_session']==true) {
                    
                // dd($inscription);
                $student = [];
    
                $student["id"] = $inscription['student']['matricule'];
                $student["Surname"] = $inscription['student']['first_name'];
                $student["Name"] = $inscription['student']['Last_name'];
                $student["__CATCHUP__"] = [];
                
                foreach ($inscription['notes'] as $mod) {
                    $student[$mod["name"]] = $mod["note"];
                    if(isset($mod['choix']) && $mod['choix']=='session'){  
                        array_push($student["__CATCHUP__"],$mod["name"]);
                    }
                }
              
    
    
    
                $student["Total weighted scores"] = $inscription["t_n_ponderer"];
                $student["Semester average"] = $inscription["t_n_average"];
                $student["Semester validation (Validated (V) /Not Validated (NV)"] = $inscription['t_n_status'];
                $student["International Grade"] = $inscription['conforme']["international_Grade"];
                $student["Grade"] = $inscription['conforme']["mention"];
                $student["Re-do exam"] = substr($inscription["t_n_redo_mod"], 1);
                $student["Remark"] = $inscription["status"]=='active'?"":$inscription["status"];
                $student["Credits earned"] = $inscription["validate_tue"];
    
                array_push($student_data, $student);
    
                if (!empty($inscription["t_n_redo_mod"])) {
                    array_push($session_student_data, $student);

                }
    
                if ($inscription["t_n_average"]>10 && empty($inscription["t_n_redo_mod"])) {
                    array_push($pv_data, [
                        "REGISTRATION NUMBER" => $inscription['student']['matricule'],
                        "NAME" => $inscription['student']['first_name'],
                        "FORENAMES" => $inscription['student']['Last_name'],
                        "SEX" => $inscription['student']['gender'],
                        "RATING" => $inscription["t_n_average"]
                    ]);
                }
               
                }
            }
           

        } else if($isWithSession == 'false') {
           
            $jsons = $semesterAverages->getAverageOf($yearID, $semesterID);
            $jsons = json_decode($jsons->getContent(), true);
            foreach ($jsons['inscriptions'] as $inscription) {
                // dd($inscription);
                $student = [];
    
                $student["id"] = $inscription['student']['matricule'];
                $student["Surname"] = $inscription['student']['first_name'];
                $student["Name"] = $inscription['student']['Last_name'];
                $student["__CATCHUP__"] = [];
                foreach ($inscription['notes'] as $mod) {
                    $student[$mod["name"]] = $mod["note"];
                    if(isset($mod['choix']) && $mod['choix']=='session'){
                        array_push($student["__CATCHUP__"],$mod["name"]);
                        
                    }
                }
    
    
    
                $student["Total weighted scores"] = $inscription["t_n_ponderer"];
                $student["Semester average"] = $inscription["t_n_average"];
                $student["Semester validation (Validated (V) /Not Validated (NV)"] = $inscription['t_n_status'];
                $student["International Grade"] = $inscription['conforme']["international_Grade"];
                $student["Grade"] = $inscription['conforme']["mention"];
                $student["Re-do exam"] = substr($inscription["t_n_redo_mod"], 1);
                $student["Remark"] = $inscription["status"]=='active'?"":$inscription["status"];
                $student["Credits earned"] = $inscription["validate_tue"];
                
    
                array_push($student_data, $student);
    
                if (!empty($inscription["t_n_redo_mod"])) {
                    array_push($session_student_data, $student);
                }
    
                if ($inscription["t_n_average"]>10 && empty($inscription["t_n_redo_mod"])) {
                    array_push($pv_data, [
                        "REGISTRATION NUMBER" => $inscription['student']['matricule'],
                        "NAME" => $inscription['student']['first_name'],
                        "FORENAMES" => $inscription['student']['Last_name'],
                        "SEX" => $inscription['student']['gender'],
                        "RATING" => $inscription["t_n_average"]
                    ]);
                }
               
            }
        }else{
            // dd('bokkk');
            $jsons = $semesterAverages->getAverage_with_session_Of($yearID, $semesterID);
            $jsons = json_decode($jsons->getContent(), true);
            // dd($jsons);
            foreach ($jsons['inscriptions'] as $inscription) {
                // dd($inscription);
                $student = [];
    
                $student["id"] = $inscription['student']['matricule'];
                $student["Surname"] = $inscription['student']['first_name'];
                $student["Name"] = $inscription['student']['Last_name'];
                $student["__CATCHUP__"]=[];
                foreach ($inscription['notes'] as $mod) {
                    $student[$mod["name"]] = $mod["note"];
                    if(isset($mod['choix']) && $mod['choix']=='session'){
                        array_push($student["__CATCHUP__"],$mod["name"]);
                    }
                }
    
    
    
                $student["Total weighted scores"] = $inscription["t_n_ponderer"];
                $student["Semester average"] = $inscription["t_n_average"];
                $student["Semester validation (Validated (V) /Not Validated (NV)"] = $inscription['t_n_status'];
                $student["International Grade"] = $inscription['conforme']["international_Grade"];
                $student["Grade"] = $inscription['conforme']["mention"];
                $student["Re-do exam"] = substr($inscription["t_n_redo_mod"], 1);
                $student["Remark"] = $inscription["status"]=='active'?"":$inscription["status"];
                $student["Credits earned"] = $inscription["validate_tue"];
    
                array_push($student_data, $student);
    
                if (!empty($inscription["t_n_redo_mod"])) {
                    array_push($session_student_data, $student);
                }
    
                if ($inscription["t_n_average"]>10 && empty($inscription["t_n_redo_mod"])) {
                    array_push($pv_data, [
                        "REGISTRATION NUMBER" => $inscription['student']['matricule'],
                        "NAME" => $inscription['student']['first_name'],
                        "FORENAMES" => $inscription['student']['Last_name'],
                        "SEX" => $inscription['student']['gender'],
                        "RATING" => $inscription["t_n_average"]
                    ]);
                }
               
            }

            
        }
       
        $headers = [];
        $tus = [];
        $total_credicts = 0;
        foreach ($jsons['theadTus'] as $tu) {
            $modulus = [];
            $total_credicts += $tu['tu_credit'];
            foreach ($tu['modulus'] as $modulu) {
                $modulus[$modulu['name']] = $modulu['credict'];
            }
            $tus[$tu['name']]['TUE'] = $modulus;
            $tus[$tu['name']]['TU CODE'] = $tu['code'];
            $modulus = [];
        }
        $headers["TUS"] = $tus;
        $headers["Total weighted scores"] = $total_credicts;
        $headers["Semester average"] = "";
        $headers["Semester validation (Validated (V) /Not Validated (NV)"] = "";
        $headers["Credits earned"] = "";
        $headers["International Grade"] = "";
        $headers["Grade"] = "";
        $headers["Re-do exam"] = "";
        $headers["Remark"] = "";


       

        // foreach ($jsons['inscriptions'] as $inscription) {
        //     // dd($inscription);
        //     $student = [];

        //     $student["id"] = $inscription['student']['matricule'];
        //     $student["Surname"] = $inscription['student']['first_name'];
        //     $student["Name"] = $inscription['student']['Last_name'];
        //     foreach ($inscription['notes'] as $mod) {
        //         $student[$mod["name"]] = $mod["note"];
        //     }



        //     $student["Total weighted scores"] = $inscription["t_n_ponderer"];
        //     $student["Semester average"] = $inscription["t_n_average"];
        //     $student["Semester validation (Validated (V) /Not Validated (NV)"] = $inscription['t_n_status'];
        //     $student["International Grade"] = $inscription['conforme']["international_Grade"];
        //     $student["Grade"] = $inscription['conforme']["mention"];
        //     $student["Re-do exam"] = substr($inscription["t_n_redo_mod"], 1);
        //     $student["Remark"] = $inscription["status"]=='active'?"":$inscription["status"];
        //     $student["Credits earned"] = $inscription["validate_tue"];

        //     array_push($student_data, $student);

        //     if (!empty($inscription["t_n_redo_mod"])) {
        //         array_push($session_student_data, $student);
        //     }

        //     if ($inscription["t_n_average"]>10 && empty($inscription["t_n_redo_mod"])) {
        //         array_push($pv_data, [
        //             "REGISTRATION NUMBER" => $inscription['student']['matricule'],
        //             "NAME" => $inscription['student']['first_name'],
        //             "FORENAMES" => $inscription['student']['Last_name'],
        //             "SEX" => $inscription['student']['gender'],
        //             "RATING" => $inscription["t_n_average"]
        //         ]);
        //     }
           
        // }

        // dd( $headers,$student_data);

        $dir = storage_path('excelFiles');

        $semester = Semester::find($semesterID);
        //add of semester id
        $semester_id = $semester->id;
        $className = $semester->level->branche->departement->label;
        //  "COMPUTER SCIENCE 22";
        $academicYear = Year::find($yearID)->name;
        $semesterNumber = explode(" ", $semester->label)[1];
        // dd(substr(explode('-',Year::find($yearID)->promotion->name)[1],2));
        // dd($student_data,$headers);
        $session = $isWithSession == 'true' ? 'Catch-up' : 'Normal';
        if($isWithSession=='both'){
            $session=  'Final after Catch-up';
        }


      
        // dd($headers, $student_data, $className . "_" . $academicYear, $semesterNumber, $academicYear,$session,'Sciences & Technologies',$semester->level->branche->departement->label,$semester->level->branche->name,$semester->level->branche->departement->name.substr(explode('-',Year::find($yearID)->promotion->name)[1],2),$semester->level->name.$semester->name, $dir . DIRECTORY_SEPARATOR);
        // dd($student_data);
        //normal sheet for all students
        SemesterReport($headers, $student_data, $className . "_" . $academicYear, $semesterNumber, $academicYear, $session, 'Sciences & Technologies', $semester->level->branche->departement->label, $semester->level->branche->name, $semester->level->branche->departement->name . substr(explode('-', Year::find($yearID)->promotion->name)[1], 2), $semester->level->name . $semester->name, false, 'all-list', $isWithSession == "both" ? true: false, $dir . DIRECTORY_SEPARATOR);

        //special for student that must redo some exams
        SemesterReportRedoExams($headers, $session_student_data, $className . "_" . $academicYear, $semesterNumber, $academicYear, $session, 'Sciences & Technologies', $semester->level->branche->departement->label, $semester->level->branche->name, $semester->level->branche->departement->name . substr(explode('-', Year::find($yearID)->promotion->name)[1], 2), $semester->level->name . $semester->name, false, 'in-session-list', $dir . DIRECTORY_SEPARATOR);

        
        // dd($semesterNumber);
        //proclamation file
        // dd($academicYear, $session, $className, $semester, "After an in-depth check, are declared definitively admitted the students whose names follow by order of merit:", $pv_data,  [
        //     "Nana Jeremie",
        //     "Sanou Lougoudoro",
        //     "Yanogo Yves Wengundi Patrick"
        // ], "Dr Kabore W. Rodrigue");
        $pv_message="Subject to an in-depth check, are declared admitted the students whose names follow by order of merit:";
        if($before_reclaim=='true'){
            $pv_message="After an in-depth check, are declared definitively admitted the students whose names follow by order of merit:";
        }
        // dd('qqqqqqqqqqqqqqqqqqqqqeee');
        Proclamation($academicYear, $session, $semester->level->branche->name, $className . "_" . $academicYear, $semester->label . '(' . $semester->name . ')', $pv_message, $pv_data, /* [], "", */$dir . DIRECTORY_SEPARATOR);
       
        // Lorsque le(s) fichies sont generes  la fonction zipAndDownload
        // peut etre appelee pour compresser et telechearger

        // dd($semesterNumber);
        zipAndDownload("Semester_" . $semesterNumber . "_report.zip");
    }

    public function studentList($yearID, $classID)
    {
        // $studentsJson = app_path('CustomPhp/ExcelPhp/Examples_excel');
        // $file = fopen($studentsJson . "/studentsList.json", 'r');
        // $data = json_decode(fread($file, filesize($studentsJson . "/studentsList.json")), true);
        // fclose($file);

        $data = [];
        $studentController = new StudentController();
        $json = $studentController->getStudentsOf($yearID, $classID);
        $jsons = json_decode($json->getContent(), true);
        // dd($jsons);
        $level = Level::findOrFail($classID);
        $year = Year::findOrFail($yearID);


        foreach ($jsons['inscriptions'] as $json) {
            // dd($json);
            // dd( '$json');
            array_push($data, [
                "ID Number" => $json['student']['matricule'],
                "Last Name" => $json['student']['first_name'],
                "First Name" => $json['student']['Last_name'],
                // "Graduation"=> 1990,
                "Birth Date" => $json['student']['birth_date'],
                "Mail" => $json['student']['email'],
                "Environment" => "BIT",
                "Level" => "Student",
                "Track" => $level->branche->departement->name
            ]);
        }

        if (count($data) != 0) {
            $class = $level->branche->departement->label;
            $academicYear =  $year->name;
            // dd($level );
            StudentsList($data, $class, $academicYear);
        } else {
            return back();
            //    dd($level );
        }
    }

    public function subjectsGen($yearID, $modulusID, $isWithSession)
    {
        $marksInputController = new MarksInputController();
        // $subjectJson = app_path('CustomPhp/ExcelPhp/Examples_excel');
        // $file = fopen($subjectJson . "/englishData.json", 'r');
        // $data = json_decode(fread($file, filesize($subjectJson . "/englishData.json")), true);
        // fclose($file);

        // $file = fopen($subjectJson . "/testsWeight.json", 'r');
        // $weight = json_decode(fread($file, filesize($subjectJson . "/testsWeight.json")), true);
        // fclose($file);
        if ($isWithSession == 'true') {
          
            $jsons = $marksInputController->viewMarksModulusMarks_with_session_Of($yearID, $modulusID);
            
        } else {
            $jsons = $marksInputController->viewMarksModulusMarksOf($yearID, $modulusID);
           
        }

        $jsons = json_decode($jsons->getContent(), true);


        //   dd($jsons);

        $year = Year::findOrFail($yearID);

        if (count($jsons) > 0) {
            $year = Promotion::findOrFail($jsons['inscriptions'][0]['promotion_id'])->year;
        }

        $data = [];
        $weight = [];
        $subject = $jsons['page_title']['name'];
        $teacherName = "--------------";
        $promotion = $jsons['page_title']['tu']['semester']['level']['branche']['departement']['label'] . ' ' . $year->promotion->name;
        $academicYear = $year->name;
        // $headers = ["ID", "Name", "Forename", "Attendance", "Participation", "test#1", "Oral test", "Exam 1", "Exam 2", "Test #4", "Test #5", "Final Average", "International Grade", "Pass or Fail?"];


        foreach ($jsons['inscriptions'] as $json) {
            $dataContent = [

                "ID" => $json['student']['matricule'],
                "Name" => $json['student']['first_name'],
                "Forename" => $json['student']['Last_name'],
            ];

            foreach ($json['tests'] as $test) {
                $dataContent[$test['title']] = $test['mark']['value'];
                $weight[$test['title']] = $test['ratio'];
            }

            if(count($json['tests'])==1){
                $dataContent['Session Mark'] = $json["tests"][0]["mark"]["value"];
            }

           
            $dataContent["Final Average"] = $json['average'];
            $dataContent["International Grade"] = $json['conforme']['international_Grade'];
            $dataContent["Pass or Fail?"] = $json['status'];

            array_push($data, $dataContent);
        }
        if (count($data) != 0 && count($weight) != 0) {

            $weight = [$weight];
            $headers = array_keys(max($data));
            SubjectReport($data, $headers, $weight, $subject, $teacherName, $promotion, $academicYear,"",count($jsons['testList']));
        } else {
            return back();
        }
    }
}