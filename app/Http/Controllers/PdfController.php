<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    //
    public function generatePDF()
    {
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];
          
        $pdf = PDF::loadView('pdf.myPDF', $data);
    
        return $pdf->download('itsolutionstuff.pdf');
    }

    public function getStudentsListOf($yearID, $classID)
    {
        // return view('pages.students.students');
        $inscriptions = Inscription::all()
            ->where('year_id', $yearID)
            ->where('level_id', $classID);
        foreach ($inscriptions as $inscription) {
            $inscription->student->parent;
        }
        // return response()->json($inscriptions);
        // dd($inscriptions->toArray());
        // return view('pdf.studentsList', compact('inscriptions'));
        $data=[ 'inscriptions'=>$inscriptions->toArray()];
        $pdf = PDF::loadView('pdf.studentsList',$data, [], 'UTF-8');
        return $pdf->download('studentsListe.pdf');
    }
}
