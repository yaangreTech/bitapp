<?php

namespace App\Http\Controllers;
use ZipArchive;
use App\Models\Year;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MarksInputController;

require_once(app_path('CustomPhp/ExcelPhp/gradeReport.php'));
require_once(app_path('CustomPhp/ExcelPhp/semesterReport.php'));
require_once(app_path('CustomPhp/ExcelPhp/studentsList.php'));
require_once(app_path('CustomPhp/ExcelPhp/subjectReport.php'));
require_once(app_path('CustomPhp/customHelpers.php'));

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
    public function genSemester()
    {
        $semesterJson = app_path('CustomPhp/ExcelPhp/Examples_excel');

        $file = fopen($semesterJson . '/studentData.json', 'r');
        $student_data = json_decode(fread($file, filesize($semesterJson . '/studentData.json')), true);
        $file = fopen($semesterJson . '/headers.json', 'r');
        $headers = json_decode(fread($file, filesize($semesterJson . '/headers.json')), true);
        $dir = storage_path('excelFiles');
        $className = "COMPUTER SCIENCE 22";
        $academicYear = "2019-2020";
        $semesterNumber = 1;
        SemesterReport($headers, $student_data, $className . "_" . $academicYear, $semesterNumber, $academicYear, $dir . DIRECTORY_SEPARATOR);

        // Lorsque le(s) fichies sont generes  la fonction zipAndDownload
        // peut etre appelee pour compresser et telechearger
        zipAndDownload("Semester_" . $semesterNumber . "_report.zip");
    }

    public function studentList($yearID,$classID)
    {
        // $studentsJson = app_path('CustomPhp/ExcelPhp/Examples_excel');
        // $file = fopen($studentsJson . "/studentsList.json", 'r');
        // $data = json_decode(fread($file, filesize($studentsJson . "/studentsList.json")), true);
        // fclose($file);

        $data=[];
        $studentController=new StudentController();
        $json=$studentController->getStudentsOf($yearID,$classID);
        $jsons=json_decode($json->getContent(),true);
        $level = Level::findOrFail($classID);
        $year = Year::findOrFail($yearID);
       foreach ($jsons as $json){
        // dd($json);
           array_push($data, [
            "ID Number"=> $json['student']['matricule'],
            "Last Name"=> $json['student']['first_name'],
            "First Name"=> $json['student']['Last_name'],
            // "Graduation"=> 1990,
            "Birth Date"=> $json['student']['birth_date'],
            "Mail"=> $json['student']['email'],
            "Environment"=> "BIT",
            "Level"=> "Student",
            "Track"=> $level->branche->departement->name
          ]);
       }

       if(count($data)!=0){
        $class =$level->branche->departement->label;
        $academicYear =  $year->name;
        StudentsList( $data, $class, $academicYear);
       }else{
           return back();
       }
    }

    public function subjectsGen($yearID, $modulusID,$isWithSession)
    {
        $marksInputController=new MarksInputController();
        // $subjectJson = app_path('CustomPhp/ExcelPhp/Examples_excel');
        // $file = fopen($subjectJson . "/englishData.json", 'r');
        // $data = json_decode(fread($file, filesize($subjectJson . "/englishData.json")), true);
        // fclose($file);

        // $file = fopen($subjectJson . "/testsWeight.json", 'r');
        // $weight = json_decode(fread($file, filesize($subjectJson . "/testsWeight.json")), true);
        // fclose($file);
        if($isWithSession==true){
            $jsons=$marksInputController->viewMarksModulusMarks_with_session_Of($yearID, $modulusID);

        }else{
            $jsons=$marksInputController->viewMarksModulusMarksOf($yearID, $modulusID);
        }

        $jsons=json_decode($jsons->getContent(),true);
    //   dd($jsons);

      $year=Year::findOrFail($yearID);
    $data=[];
    $weight=[];
        $subject = $jsons['page_title']['name'];
        $teacherName = "--------------";
        $promotion =$jsons['page_title']['tu']['semester']['level']['branche']['departement']['label'].' '.$year->promotion->name;
        $academicYear = $year->name;
        // $headers = ["ID", "Name", "Forename", "Attendance", "Participation", "test#1", "Oral test", "Exam 1", "Exam 2", "Test #4", "Test #5", "Final Average", "International Grade", "Pass or Fail?"];
       
      
        foreach ($jsons['inscriptions'] as $json){
            $dataContent=[
             
                "ID"=> $json['student']['matricule'],
                "Name"=>$json['student']['first_name'],
                "Forename"=> $json['student']['Last_name'],
            ];

            foreach ($json['tests'] as $test){
                $dataContent[$test['title']]=$test['mark']['value'];
                $weight[$test['title']]=$test['ratio'];
            }
            

            $dataContent["Final Average"]= $json['average'];
            $dataContent["International Grade"]= $json['conforme']['international_Grade'];
            $dataContent["Pass or Fail?"]= $json['status'];

            // dd($dataContent);

            array_push($data, $dataContent);
        }
        $weight=[$weight];
        $headers=array_keys(max($data));
        // dd($data);
        SubjectReport($data, $headers, $weight, $subject, $teacherName, $promotion, $academicYear);
    }
}