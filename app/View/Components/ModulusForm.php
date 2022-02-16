<?php

namespace App\View\Components;

use App\Models\Departement;
use Illuminate\View\Component;

class ModulusForm extends Component
{
    public $departements;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this-> departements =Departement::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('form_components.modulus-form');
    }
}
