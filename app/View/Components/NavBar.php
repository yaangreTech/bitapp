<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavBar extends Component
{
   public $displayf;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $displayf)
    {
        //
        $this->displayf = $displayf;

        // dd($displayf);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('widgets.nav-bar');
    }
}
