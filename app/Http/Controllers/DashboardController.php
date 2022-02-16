<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Year;
use App\Models\Classe;
use App\Models\Departement;
use App\Models\Inscription;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $year=Year::all()->last();

    $departments = Departement::all();
    $classes=Classe::all();
    $students=Inscription::all()->where('year_id',$year!=null?$year->id:0);
    $users=User::all()->where('status','active');

                
        return view('dashboard',compact('year','departments','classes','students','users'));
    }
}
