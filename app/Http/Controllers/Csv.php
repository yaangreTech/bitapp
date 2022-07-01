<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Mark;
use App\Models\Year;
use App\Models\Module;
use League\Csv\Reader;
use League\Csv\Writer;
use SplTempFileObject;
use App\Models\Parente;
use App\Models\Student;
use App\Models\Promotion;
use App\Models\Departement;
use App\Models\Inscription;
use Illuminate\Http\Request;
use League\Csv\EncloseField;
use League\Csv\CharsetConverter;
use Illuminate\Support\Facades\Auth;

class Csv extends Controller
{
    public function import_student_form()
    {
        $departments = Departement::all();
        if (Auth::user()->right->title == 'isHd') {
            $departments = Departement::where('id',Auth::user()->manage->departement_id)->get();
        }
        $promotions = Promotion::all();
        return view(
            'pages.students.import_student_form',
            compact('departments', 'promotions')
        );
    }

    public function saveStudents(Request $request)
    {
        $request->validate([
            'studentClasse' => ['required'],
            'studentPromotion' => ['required'],
        ]);

        $retour = [];

        // $csv = Reader::createFromPath('file.csv', 'r');
        $csv = Reader::createFromPath($request->ficher1, 'r');

        try {
            $csv->addStreamFilter('convert.iconv.ISO-8859-15/UTF-8');

            $csv->setHeaderOffset(0);

            $retour = [
                [
                    'line' => 'Malformed error',
                    'type' => 'bg-red',
                    'message' =>
                        'File malformed. Please check your file compared to the themplate',
                ],
            ];

            $header = $csv->getHeader(); //returns the CSV header record
            $records = $csv->getRecords();

            $tableau = [];
            $current_year = Year::all()->last();
            if (count(explode(';', $header[0])) >= 12) {
                $retour = [];
                foreach ($records as $cs) {
                    foreach ($cs as $c) {
                        // print_r(explode(';', $c));
                        $donner = explode(';', $c);

                        $studentM = Student::where(
                            'matricule',
                            mb_convert_encoding($donner[0], 'UTF-8', 'UTF-8')
                        )->first();
                        $studentE = Student::where(
                            'email',
                            mb_convert_encoding($donner[6], 'UTF-8', 'UTF-8')
                        )->first();
                        // dd($studentM);

                        if ($studentM == null and $studentE == null) {
                            $student_id = Student::insertGetId([
                                'matricule' => mb_convert_encoding(
                                    $donner[0],
                                    'UTF-8',
                                    'UTF-8'
                                ),
                                'first_name' => ucwords(
                                    mb_convert_encoding(
                                        $donner[1],
                                        'UTF-8',
                                        'UTF-8'
                                    )
                                ),
                                'Last_name' => ucwords(
                                    mb_convert_encoding(
                                        $donner[2],
                                        'UTF-8',
                                        'UTF-8'
                                    )
                                ),
                                'gender' => mb_convert_encoding(
                                    $donner[3],
                                    'UTF-8',
                                    'UTF-8'
                                ),
                                'phone' => mb_convert_encoding(
                                    $donner[4],
                                    'UTF-8',
                                    'UTF-8'
                                ),
                                'birth_date' => mb_convert_encoding(
                                    $donner[5],
                                    'UTF-8',
                                    'UTF-8'
                                ),
                                'birth_place' => mb_convert_encoding(
                                    $donner[6],
                                    'UTF-8',
                                    'UTF-8'
                                ),
                                'email' => mb_convert_encoding(
                                    $donner[7],
                                    'UTF-8',
                                    'UTF-8'
                                ),
                                'promotion_id' => $request->studentPromotion,
                                'created_at' => Carbon::now(),
                                'updated_at' => Carbon::now(),
                            ]);

                            $parent = Parente::insert([
                                'student_id' => $student_id,
                                'first_name' => ucwords(
                                    mb_convert_encoding(
                                        $donner[8],
                                        'UTF-8',
                                        'UTF-8'
                                    )
                                ),
                                'Last_name' => ucwords(
                                    mb_convert_encoding(
                                        $donner[9],
                                        'UTF-8',
                                        'UTF-8'
                                    )
                                ),
                                'type' => mb_convert_encoding(
                                    $donner[10],
                                    'UTF-8',
                                    'UTF-8'
                                ),
                                'profession' => mb_convert_encoding(
                                    $donner[11],
                                    'UTF-8',
                                    'UTF-8'
                                ),
                                'phone' => mb_convert_encoding(
                                    $donner[12],
                                    'UTF-8',
                                    'UTF-8'
                                ),
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

                            array_unshift($retour, [
                                'line' => 'Student with ID: ' . $donner[0],
                                'type' => 'bg-green',
                                'message' => 'succesffuly inserted',
                            ]);
                        } else {
                            array_unshift($retour, [
                                'line' => 'Student with ID: ' . $donner[0],
                                'type' => 'bg-red',
                                'message' =>
                                    'Not inserted, ID or email duplication',
                            ]);
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            $retour = [
                [
                    'line' => 'Empty File',
                    'type' => 'bg-red',
                    'message' => 'The file is empty! Please fill it and retry',
                ],
            ];
        }

        return response()->json($retour);
    }

    public function downloadStudentList_themplate(Request $request)
    {

        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->setDelimiter(';');

        $csv->setOutputBOM(Reader::BOM_UTF8);

        $csv->insertAll([['sep=;'],['ID','Name','Forename','Gender','Phone','Birthdate','Birthplace','Email','ParentName','ParentForename','Parent_type','Parent_profession','ParentPhone']]);


        $csv->output('studentList_themplate.csv');
    }

 


    public function download_marks_form_themplate(
        Request $request,
        $modulusID,
        $type
    ) {
        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->setDelimiter(';');

        $csv->setOutputBOM(Reader::BOM_UTF8);
        $year = Year::all()->last();
        $modulus = Module::findOrFail($modulusID);
        // $modulus->tu->semester->level->branche;
        //we insert the CSV header
        if ($year != null) {
            $tests = $modulus->tests->where('year_id', $year->id)->where('type', 'normal');
            $testsNames = ['ID', 'Name', 'Forname'];
            $testsratios = ['', '', ''];
            foreach ($tests as $test) {
                array_push($testsNames, $test->title);
                array_push($testsratios, $test->ratio . ' %');
            }

            $csv->insertAll([['sep=;'],$testsratios, $testsNames]);

            if ($type == 'withList') {
                $inscriptions = $modulus->tu->semester->level->inscriptions->where(
                    'year_id',
                    $year->id
                );

                foreach ($inscriptions as $inscription) {
                    $student = $inscription->student;
                    $csv->insertOne([
                        $student->matricule,
                        $student->first_name,
                        $student->Last_name,
                    ]);
                }
            }
        }

        // dd($csv);

        $csv->output(
            $modulus->tu->semester->level->branche->name .
                '-' .
                $modulus->tu->semester->level->label .
                '-' .
                $modulus->tu->semester->label .
                '-' .
                $modulus->tu->name .
                '-' .
                $modulus->name .
                '-' .
                $year->name .
                '.csv'
        );
    }

    public function detectDelimiter($csvFile)
{
    $delimiters = [";" => 0, "," => 0, "\t" => 0, "|" => 0];

    $handle = fopen($csvFile, "r");
    $firstLine = fgets($handle);
    fclose($handle); 
    foreach ($delimiters as $delimiter => &$count) {
        $count = count(str_getcsv($firstLine, $delimiter));
    }

    return array_search(max($delimiters), $delimiters);
}

    public function save_marks(Request $request, $modulusID)
    {
        $request->validate([
            // 'ficher1'=>['required'],
        ]);

        $year = Year::all()->last();
        $modulus = Module::findOrFail($modulusID);

        $retour = [];

        // $csv = Reader::createFromPath('file.csv', 'r');
        $csv = Reader::createFromPath($request->ficher1, 'r');
        // dd($this->detectDelimiter($request->ficher1));
        try {
            $csv->addStreamFilter('convert.iconv.ISO-8859-15/UTF-8');
           

             $csv->setDelimiter($this->detectDelimiter($request->ficher1));
            // $csv->setHeaderOffset(0);
            $csv->setHeaderOffset(1);
            $retour = [
                [
                    'line' => 'Malformed error',
                    'type' => 'bg-red',
                    'message' =>
                        'File malformed. Please check your file compared to the themplate',
                ],
            ];
            $header = $csv->getHeader();
            $records = $csv->getRecords($header);

           
            
            $index = 0;

            if ($year != null) {
                $tests = $modulus->tests->where('year_id', $year->id)->where('type', 'normal');
                $testsNames = ['ID', 'Name', 'Forname'];
                foreach ($tests as $test) {
                    array_push($testsNames, $test->title);
                }
                //   dd( $header );
                if ($header == $testsNames) {
                    if(iterator_count($records)>=2){
                        $retour = [];
                        foreach ($records as $record) {
                            
                            if ($index != 0) {
                                $student=Student::where('matricule',$record['ID'])->first();
                                if($student!=null){
                                    $insc=$student->inscriptions->where('year_id',$year->id)->first();
                                    if($insc!=null){
                                        foreach ($tests as $test) {
                                            $mark=Mark::where('test_id', $test->id)->where('inscription_id',$insc->id)->first();
                                    
                                           if($record[$test->title]!="" && is_float(floatval( join('.', explode(',', $record[$test->title]))))){
                                            if($mark!=null){
                                                $mark->value=floatval(join('.',explode(',', $record[$test->title])));
                                                $mark=$mark->update();
                                                $mark==true && array_push($retour, [
                                                    'line' => 'Student with ID '.$record['ID'].','.$test->title.' mark Successfull updated',
                                                    'type' => 'bg-green',
                                                    'message' =>
                                                        'Successfull updated',
                                                ]);
                                            }else{
                                               $mark= Mark::Insert([
                                                    'value'=>floatval(join('.',explode(',', $record[$test->title]))),
                                                    'inscription_id'=>$insc->id,
                                                    'test_id'=>$test->id,
                                                    'created_at'=>Carbon::now(),
                                                    'updated_at'=>Carbon::now()
                                                ]);

                                                $mark==true &&array_push($retour, [
                                                    'line' => 'Student with ID '.$record['ID'].','.$test->title.' mark Successfull added',
                                                    'type' => 'bg-green',
                                                    'message' =>
                                                        'Successfull added',
                                                ]);

                                            }
                                           }else{
                                            array_push($retour, [
                                                'line' => 'Student with ID '.$record['ID'].','.$test->title.' mark Not inserted !',
                                                'type' => 'bg-red',
                                                'message' =>
                                                    'Empty or malformated value',
                                            ]); 
                                           }
                                           
                                            
                                        }

                                    }else{      
                                    array_push($retour, [
                                        'line' => 'Student with ID '.$record['ID'].' Not registered in this modulus classe !',
                                        'type' => 'bg-red',
                                        'message' =>
                                            'Please check your file',
                                    ]);
                                    }
                                }else{
                                    
                                    array_push($retour, [
                                        'line' => 'Student with ID '.$record['ID'].' Not exits',
                                        'type' => 'bg-red',
                                        'message' =>
                                            'Please check your file',
                                    ]);
                                }
                                

                            }
                            $index++;
                        }
                    }else{
                        $retour = [
                            [
                                'line' => 'Oooop!!! We are sorry ',
                                'type' => 'bg-red',
                                'message' =>
                                    'It look like you file is empty',
                            ],
                        ];
                    }
                } else {
                    $retour = [
                        [
                            'line' => 'Malformated header',
                            'type' => 'bg-red',
                            'message' =>
                                'Please check your file compared to the themplate',
                        ],
                    ];
                    
                }
            } else {
                $retour = [
                    [
                        'line' => 'Not school year yet',
                        'type' => 'bg-red',
                        'message' =>
                            'Please add school year before',
                    ],
                ];
            }
        } catch (\Exception $e) {
            $retour = [
                [
                    'line' => 'Malformed error',
                    'type' => 'bg-red',
                    'message' =>
                        'File malformed. Please check your file compared to the themplate',
                ],
            ];
        }

        return response()->json($retour);
    }
}
