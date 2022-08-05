<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class YearSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('years')->insert(array (
            0 => 
            array (
              'start_date' => '30/09/2018',
              'end_date' => '12/07/2022',
              'name' => '2018-2019',
              'created_at' => '12/07/2022 15:13',
              'updated_at' => '12/07/2022 15:28',
              'deleted_at' => '12/07/2022 15:28',
            ),
            1 => 
            array (
              'start_date' => '30/09/2019',
              'end_date' => '12/07/2022 15:14',
              'name' => '2019-2020',
              'created_at' => '12/07/2022 15:28',
              'updated_at' => '12/07/2022 15:28',
              'deleted_at' => '12/07/2022 15:28',
            ),
            2 => 
            array (
              'start_date' => '03/10/2021',
              'end_date' => null,
              'name' => '2021-2022',
              'created_at' => '12/07/2022 15:30',
              'updated_at' => '12/07/2022 15:30',
              'deleted_at' => null,
            ),
          ));
    }
}
