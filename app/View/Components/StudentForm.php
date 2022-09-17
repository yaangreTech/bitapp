<?php

namespace App\View\Components;

use App\Models\Promotion;
use App\Models\Departement;
use Illuminate\View\Component;

class StudentForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $departments;
    public $promotions;

    public function __construct()
    {
        //

        $this->departments = Departement::all();
        $this->promotions = Promotion::orderBy('id', 'desc')->take(3)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('form_components.student-form');
    }
}
