<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tables=['departements','branches', 'levels','semesters','years','promotions','tus','modules','students','parentes',
            'inscriptions',
            'tests',
            'marks'
    ];
        try {
            foreach ($tables as $table){
                try {
                    $datas = file_get_contents(base_path("database/data/".$table.'.json'));
                    $datas=json_decode($datas, true);
                    // dd($datas[$table]);
                    foreach ($datas[$table] as $data){
                      
                        DB::table($table)->insert($data);
                        print_r($data);
                    }
                } catch (\Throwable $th) {
                    dd( $table,$th);
                }
               
               
            }
        } catch (\Throwable $th) {
           dd('$th->getMessage()');
        }
            
    }
}
