<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Year;
use App\Models\Level;
use App\Models\Classe;
use App\Models\Branche;
use App\Models\Departement;
use App\Models\Inscription;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // get the last year from the database
        $year = Year::all()->last();

        // Get all departments from the database
        $departments = Departement::all();

        // get all classes from the database
        $levels = Level::all();

        $options = Branche::all();

        // get all students inscription of the current year from the database
        $students = Inscription::all()->where(
            'year_id',
            $year != null ? $year->id : 0
        );

        // get all active users from the database
        $users = User::all()->where('status', 'active');

 

        // return of the dashboard view + variables
        return view(
            'dashboard',
            compact('year', 'options' ,'departments', 'levels', 'students', 'users')
        );
    }
}
