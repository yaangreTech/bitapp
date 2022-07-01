<?php

namespace App\Http\Controllers;
use App\Models\Level;
use App\Models\Departement;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GraduatedController extends Controller
{

  function graduated_index(){
    return view('pages.documents.graduated');
  }

  // function bachelor(){
  //   return view('pages.documents.graduated');
  // }

  // function master(){
  //   return view('pages.documents.graduated');
  // }


  function getBachelorStudentsOf($year_id){

   $autheur=Auth::user();
   
   if($autheur->right->title== "isHd"){
   

    $levelIds=Departement::findOrFail($autheur->manage->departement_id)->levels->pluck('id');

    $inscription_students=Inscription::where('year_id',$year_id)
    ->where('status', 'ended')
    ->whereIn('level_id',$levelIds)
    ->whereIn('level_id',Level::where('name', 'L3')
    ->select('id')
    ->pluck('id'))->get()->load(['student','level']);
    return response()->json($inscription_students);
   }else{
    $inscription_students=Inscription::where('year_id',$year_id)
    ->where('status', 'ended')
    ->whereIn('level_id',Level::where('name', 'L3')
    ->select('id')
    ->pluck('id'))->get()->load(['student','level']);
    return response()->json($inscription_students);
   }
   
  }

  function getMasterStudentsOf($year_id){

    $autheur=Auth::user();

    if($autheur->right->title== "isHd"){
      $levelIds=Departement::findOrFail($autheur->manage->departement_id)->levels->pluck('id');
      $inscription_students=Inscription::where('year_id',$year_id)
      ->where('status', 'ended')
      ->whereIn('level_id',$levelIds)
      ->whereIn('level_id',Level::where('name', 'M2')
      ->select('id')
      ->pluck('id'))->get()->load(['student','level']);
  
      return response()->json($inscription_students);
    }else{
    $inscription_students=Inscription::where('year_id',$year_id)
    ->where('status', 'ended')
    ->whereIn('level_id',Level::where('name', 'M2')
    ->select('id')
    ->pluck('id'))->get()->load(['student','level']);

    return response()->json($inscription_students);
  }
  
  }



}