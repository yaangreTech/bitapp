<?php

namespace App\View\Components;
use App\Models\User;

use App\Models\Level;
use App\Models\Conforme;
use App\Models\Level_format;
use Illuminate\View\Component;
use App\Models\Semester_format;

class AppLayout extends Component
{
    public $filtrage;
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
public $diplom;
    public function __construct($filtrage)
    {
        //    $user= User::all();

        $this->filtrage = $filtrage;
        $this->saveConformes();
        $this->saveLevel();
   }

    public function render()
    {
        return view('layouts.app');
    }

    public function saveConformes()
    {
        $check_conformes = Conforme::find(1);
        if ($check_conformes == null) {
            $string =
                '[{"initial":0,"final":9,"Relative":"0%","international_Grade":"F","mention":"Not passed"},{"initial":9,"final":10,"Relative":"45%","international_Grade":"F","mention":"Not passed"},{"initial":10,"final":"10.5","Relative":"50%","international_Grade":"D","mention":"Satisfactory (Passable)"},{"initial":"10.5","final":11,"Relative":"53%","international_Grade":"C-","mention":"Satisfactory (Passable)"},{"initial":11,"final":12,"Relative":"55%","international_Grade":"C","mention":"Satisfactory (Passable)"},{"initial":12,"final":13,"Relative":"60%","international_Grade":"C+","mention":"Pretty Good (assez bien)"},{"initial":13,"final":14,"Relative":"65%","international_Grade":"B-","mention":"Pretty Good  (assez bien)"},{"initial":14,"final":15,"Relative":"70%","international_Grade":"B","mention":"Good (bien)"},{"initial":15,"final":16,"Relative":"75%","international_Grade":"B+","mention":"Good (bien)"},{"initial":16,"final":17,"Relative":"80%","international_Grade":"A-","mention":"Very good (très bien)"},{"initial":17,"final":18,"Relative":"85%","international_Grade":"A","mention":"Very good (très bien)"},{"initial":18,"final":19,"Relative":"90%","international_Grade":"A","mention":"Very good (très bien)"},{"initial":19,"final":20,"Relative":"95%","international_Grade":"A+","mention":"Very good (très bien)"},{"initial":20,"final":20,"Relative":"100%","international_Grade":"A+","mention":"Very good (très bien)"}]';
            $json = json_decode($string);
            foreach ($json as $conforme) {
                $array = (array) $conforme;
                Conforme::insert($array);
            }
        }
    }

    public function saveLevel()
    {
        $level = Level_format::find(1);
        if ($level == null) {
            $string =
                '[{"name":"L1","label":"Licence 1","cycle":"licence","semesters":[{"name":"S1","label":"Semester 1"},{"name":"S2","label":"Semester 2"}]},{"name":"L2","label":"Licence 2", "cycle":"licence", "semesters":[{"name":"S3","label":"Semester 3"},{"name":"S4","label":"Semester 4"}]},{"name":"L3","label":"Licence 3", "cycle":"licence", "semesters":[{"name":"S5","label":"Semester 5"},{"name":"S6","label":"Semester 6"}]},{"name":"M1","label":"Master 1","cycle":"master","semesters":[{"name":"S7","label":"Semester 7"},{"name":"S8","label":"Semester 8"}]},{"name":"M2","label":"Master 2", "cycle":"master", "semesters":[{"name":"S9","label":"Semester 9"},{"name":"S10","label":"Semester 10"}]}]';
            $json = json_decode($string);
            // dd($json);
            foreach ($json as $nive) {
                $LevelID=Level_format::insertGetId([
                    'name' => $nive->name,
                    'label' => $nive->label,
                    'cycle' => $nive->cycle,
                ]);
                foreach ($nive->semesters as $semesterjson) {
                    $semesters = (array) $semesterjson;
                    Semester_format::insert([
                        'name' => $semesterjson->name,
                        'label' => $semesterjson->label,
                        'level_format_id' => $LevelID,
                    ]);
                }
            }
        }
    }
}
