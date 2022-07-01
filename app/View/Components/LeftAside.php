<?php

namespace App\View\Components;

use App\Models\Departement;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class LeftAside extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $departements;

    public function __construct()
    {
        //
        switch (Auth::user()->right->title) {
            case 'isAdmin':
                $this->departements =Departement::all();
                break;
            case 'isCh':
                $this->departements =Departement::all();
                break;
            case 'isHd':
                $manage=Auth::user()->manage;   
                 $this->departements =Departement::where('id','=',$manage->departement_id)->get();
                break;
              default:
                 $this->departements =Array(); 
              break; 

            
        }

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('widgets.left-aside');
    }
}
