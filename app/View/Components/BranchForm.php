<?php

namespace App\View\Components;

use App\Models\Departement;
use App\Models\Level_format;
use Illuminate\View\Component;

class BranchForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $departements;
     public $levels;

    public function __construct()
    {
        //

        $this->departements=Departement::all();
        $this->levels=Level_format::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('form_components.branch-form');
    }
}
