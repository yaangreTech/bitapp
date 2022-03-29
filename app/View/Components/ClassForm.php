<?php

namespace App\View\Components;

use App\Models\Semester;
use App\Models\Departement;
use Illuminate\View\Component;

class ClassForm extends Component
{
    public $departements;
    public $semesters;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->departements =Departement::all();
        $this->semesters=Semester::all();
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
