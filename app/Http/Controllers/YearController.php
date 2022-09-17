<?php

namespace App\Http\Controllers;

use App\Models\Tu;
use Carbon\Carbon;
use App\Models\Year;
use App\Models\Module;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class YearController extends Controller
{
    //
    public function index()
    {
        $years = Year::orderBy('id', 'DESC')->get();
        foreach ($years as $year) {
            $year->promotion;
            $year->inscriptions;
        }
        return view('pages.configures.promotions', compact('years'));
    }

    public function getYear($id)
    {
        switch ($id) {
            case 0:
                $year = Year::orderBy('id', 'DESC')->first();
                $year->promotion;
                break;
            case -1:
                $data = Year::orderBy('id', 'ASC')->get();
                if ($data->count() > 1) {
                    $year = $data[$data->count() - 2];
                    $year->promotion;
                } else {
                    $year = [];
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

    public function storeYear(Request $request,$previousID)
    {
        $request->validate([
            'start_date' => ['required'],
            'year_name' => ['required'],
            'promotion_name' => ['required'],
        ]);

        if($previousID!=0 && $previousID!='0'){
            $current_year = Year::find($previousID);
            $current_year->end_date = Carbon::now();
            $current_year->update();
        }
        $new_year_id = DB::table('years')->insertGetId([
            'start_date' => $request->start_date,
            'name' => $request->year_name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $new_promotion = Promotion::insert([
            'name' => $request->promotion_name,
            'year_id' => $new_year_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        
     
        if($previousID!=0 && $previousID!='0'){
            // Copy tus

            $tus=Tu::where('year_id',$current_year->id)->get();
           
            foreach($tus as $tu){
                $modules=Module:: where('tu_id',$tu->id)->get(['name','credict','heure']);
                $copiedtuID=DB::table('tus')->insertGetId([
                    'semester_id'=>$tu->semester_id,
                    'year_id'=>$new_year_id,
                    'code'=>$tu->code,
                    'name'=>$tu->name,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                foreach ($modules as $module){
                    DB::table('modules')->insert([
                        'tu_id'=> $copiedtuID,
                        'name'=>$module->name,
                        'credict'=>$module->credict,
                        'heure'=>$module->heure,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }   
        }

    
        return response()->json($new_promotion);
    }
    public function updateYear($id)
    {
    }
    public function deleteYear($id)
    {
        $year = Year::findOrFail($id);
        // dd($year);
        $year = $year->delete();
        return response()->json($year);
    }
    public function destroyYear($id)
    {
    }
}
