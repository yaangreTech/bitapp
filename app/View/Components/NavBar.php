<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Year;

class NavBar extends Component
{
   public $displayf;
   public $years;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $displayf)
    {
        //
        $this->displayf = $displayf;
        $this->years = Year::orderBy('id','DESC')->get();

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
