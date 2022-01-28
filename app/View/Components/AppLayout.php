<?php

namespace App\View\Components;
use App\Models\User;

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

    }

    public function render()
    {
        return view('layouts.app');
    }
}
