<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Departement;
use App\Models\Semestre_name;

class ClassForm extends Component
{
    public $departements;
    public $semestre_names;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->departements =Departement::all();
        $this->semestre_names=Semestre_name::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('form_components.class-form');
    }
}
