<?php

namespace App\View\Components;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Right;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
        public function __construct(){
            $this->saveRights();
            $this->saveOwner();
        }

    public function render()
    {
        return view('layouts.guest');

     
    }


    protected function saveRights(){
        $check_rights=Right::find(1);
        if($check_rights==null){
            $string='[{"title":"isAdmin", "label":"Admin"},{"title":"isHd", "label":"Head of department"},{"title":"isCh", "label":"Head of Scolarity"},{"title":"isha", "label":"Head of Alumni"}]';
            $json=json_decode($string);
            foreach ($json as $right){
                $array=(array) $right;
               Right::insert( $array);
            }    
        }
    }

    protected function saveOwner(){
        $check_owner=User::find(1);
        if($check_owner==null){
            $user = User::insert([
                'firstname' => 'Admin',
                'lastname' => 'Admin',
                'email' => 'admin@gmail.com',
                'right_id' => 1,
                'status' => 'super',
                'password' => Hash::make('adminadmin'),
                'password' => Hash::make('adminadmin'),
                'created_at' =>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);
    
            // event(new Registered($user));
        }
    }
}
