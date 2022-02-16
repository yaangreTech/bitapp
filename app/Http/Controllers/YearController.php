<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Year;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class YearController extends Controller
{
    //
    public function  index(){
        $years=Year::orderBy('id','DESC')->get();
        foreach($years as $year){
            $year->promotion;
            $year->inscriptions;
            
        }
        return view('pages.configures.promotions', compact('years'));
    }

    public function getYear($id){
      switch ($id) {
          case 0:
            $year = Year::all()->last();
            $year->promotion;
              break;
            case -1:
                $data=Year::all();
                if($data->count()>1){
                    $year = $data[$data->count() - 2];
                    $year->promotion;
                }else{
                    $year=Object();
                }
                
                break;
          default:
          $year = Year::findOrFail($id);
          $year->promotion;
              # code...
              break;
      }
      return response()->json($year);
    }

    public function  storeYear(Request $request){
        $request->validate([
            'start_date'=>['required'],
            'year_name'=>['required'],
            'promotion_name'=>['required'],
            
        ]);

        $current_year = Year::all()->last();
       if($current_year!=null){
        $current_year->end_date=Carbon::now();
        $current_year->update();
       }

        $new_year_id =DB::table('years')->insertGetId([
            'start_date'=>$request->start_date,
            'name'=>$request->year_name,
            'created_at'=>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);

        $new_promotion=Promotion::insert([
            'name'=>$request->promotion_name,
            'year_id'=>$new_year_id,
            'created_at'=>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);
        return response()->json($new_promotion);
    }
    public function  updateYear($id){}
    public function  deleteYear($id){
        $year=Year::findOrFail($id);
        // dd($year);
        $year=$year->delete();
        return response()->json($year);
    }
    public function  destroyYear($id){}
}
