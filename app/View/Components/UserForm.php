<?php

namespace App\View\Components;

use App\Models\Right;
use App\Models\Departement;
use Illuminate\View\Component;

class UserForm extends Component
{
    public $rights;
    public $departements;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        //
        
        $this->rights = Right::all();
        $this->departements = Departement::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('form_components.user-form');
    }

    public function getRights(){
        $rights=Right::all();
        dd($rights);
    }
}
