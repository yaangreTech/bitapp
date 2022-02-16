<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Right;
use App\Models\Manage;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class UtilisateurController extends Controller
{
    //
    public function  index(){
        $users = User::all();
        foreach ($users as $user){
            if($user->right->title=='isHd'){
                $user['department']= Departement::findOrFail($user->manage->departement_id);
            }
            
        }
        return view('pages.configures.users', compact('users'));
    }

    public function  verifier_email($email){
   
        $user = User::where('email','=',$email)->first();

        // dd($user);
        return response()->json($user);
    }

    public function  storeUtilisateur(Request $request){
        $data = false;
        $request->validate([
            'email'=>['required'],
            'right_id'=>['required'], 
        ]);

        $user = User::create([
            'email' => $request->email,
            'right_id' => $request->right_id,
            'password' => Hash::make($request->email),
        ]);

        
        event(new Registered($user));
        if($user!=null){
            $data = true;
            if($user->right->title=='isHd'){
                $manage=Manage::insert([
                    'departement_id'=>$request->user_departement,
                   'user_id'=>$user->id,
                   'created_at'=>Carbon::now(),
                   'updated_at' =>Carbon::now(),
                   ]);
                   $data=$manage;
            }
  
        }
    
        return response()->json($data);

    }
    public function  updateUtilisateur($id){}
    
    public function  completeRegistration(Request $request){
        $user =User::findOrFail(Auth::user()->id);
        $user->firstname=$request->firstname;
        $user->lastname=$request->lastname;
        $user->phone=$request->phone;
        event(new Registered($user));
        $user= $user->update();
        return response()->json($user);

       
    //    dd($user);
    }
    
    public function  deleteUtilisateur($id){
        $user=User::findOrFail($id);
        $user=$user->delete();
        return response()->json($user);
    }
    public function  destroyUtilisateur($id){}
}
