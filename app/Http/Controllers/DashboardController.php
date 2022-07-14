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
use Illuminate\Support\Facades\DB;

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
            compact('year', 'options', 'departments', 'levels', 'students', 'users')
        );
    }

    public function getChartDetails()
    {
        $deps = [];
        $levs = [];
        $seriesdata = [];


        $departments = Departement::all();
        $levelforms = DB::select('select * from level_formats');

        $lastyear = Year::get()->last();

        if ($lastyear) {

            foreach ($levelforms as $levelform) {
                array_push($levs, $levelform->label);
            }
            foreach ($departments as $department) {
                $deptseries = [];
                array_push($deps, $department->label);
                foreach ($levelforms as $levelform) {
                    $level_ids = Level::where('name', $levelform->name)->whereIn(
                        'branche_id',
                        Branche::where('departement_id', $department->id)
                            ->select('id')
                            ->pluck('id')
                    )->select('id')->pluck('id');

                    array_push($deptseries, Inscription::whereIn('level_id', $level_ids)->where('year_id', $lastyear->id)->count());
                }

                array_push($seriesdata, ['name' => $department->label, 'data' => $deptseries]);
            }
        }

        return response()->json(['deps'=>$deps, 'levs'=>$levs, 'seriesdata'=>$seriesdata]);
    }
}
