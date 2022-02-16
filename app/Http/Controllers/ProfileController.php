<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class ProfileController extends Controller
{
    //
    public function index(){
        return view('pages.others.profile');
    }

    public function  updateProfile(Request $request,$id){
        $request->validate([
            'firstname'=>['string'],
            'lastname'=>['string'],
            'phone'=>['string'],
        ]);

        $user=User::findOrFail($id);
        $user->firstname=$request->firstname;
        $user->lastname=$request->lastname;
        $user->phone=$request->phone;
        // event(new Registered($user));
        $user=  $user->update();
    return response()->json($user);

    }
}
