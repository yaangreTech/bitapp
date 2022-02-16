<?php

namespace App\View\Components;
use App\Models\User;

use App\Models\Conforme;
use Illuminate\View\Component;

class AppLayout extends Component
{

    public $filtrage;
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */

    public function __construct($filtrage){
    //    $user= User::all();

    //    dd($user);

    $this->filtrage=$filtrage;
    $this->saveConformes();
    }

    public function render()
    {
        return view('layouts.app');
    }


    public function saveConformes(){
        $check_conformes=Conforme::find(1);
        if($check_conformes==null){
            $string= '[{"initial":0,"final":9,"Relative":"0%","international_Grade":"F","mention":"Not passed"},{"initial":9,"final":10,"Relative":"45%","international_Grade":"F","mention":"Not passed"},{"initial":10,"final":"10.5","Relative":"50%","international_Grade":"D","mention":"Satisfactory (Passable)"},{"initial":"10.5","final":11,"Relative":"53%","international_Grade":"C-","mention":"Satisfactory (Passable)"},{"initial":11,"final":12,"Relative":"55%","international_Grade":"C","mention":"Satisfactory (Passable)"},{"initial":12,"final":13,"Relative":"60%","international_Grade":"C+","mention":"Pretty Good (assez bien)"},{"initial":13,"final":14,"Relative":"65%","international_Grade":"B-","mention":"Pretty Good  (assez bien)"},{"initial":14,"final":15,"Relative":"70%","international_Grade":"B","mention":"Good (bien)"},{"initial":15,"final":16,"Relative":"75%","international_Grade":"B+","mention":"Good (bien)"},{"initial":16,"final":17,"Relative":"80%","international_Grade":"A-","mention":"Very good (très bien)"},{"initial":17,"final":18,"Relative":"85%","international_Grade":"A","mention":"Very good (très bien)"},{"initial":18,"final":19,"Relative":"90%","international_Grade":"A","mention":"Very good (très bien)"},{"initial":19,"final":20,"Relative":"95%","international_Grade":"A+","mention":"Very good (très bien)"},{"initial":20,"final":20,"Relative":"100%","international_Grade":"A+","mention":"Very good (très bien)"}]';
            $json=json_decode($string);
            foreach ($json as $conforme){
                $array=(array) $conforme;
               Conforme::insert( $array);
            }    
        }
    }
}
