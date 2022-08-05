<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotionsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('promotions')->insert(array (
            0 => 
            array (
              'year_id' => '2',
              'name' => 'Promotion-2022',
              'created_at' => '12/07/2022 15:14',
              'updated_at' => '12/07/2022 15:28',
              'deleted_at' => '12/07/2022 15:28',
            ),
            1 => 
            array (
              'year_id' => '1',
              'name' => 'Promotion-2021',
              'created_at' => '12/07/2022 15:13',
              'updated_at' => '12/07/2022 15:28',
              'deleted_at' => '12/07/2022 15:28',
            ),
            2 => 
            array (
              'year_id' => '3',
              'name' => 'Promotion-2024',
              'created_at' => '12/07/2022 15:30',
              'updated_at' => '12/07/2022 15:30',
              'deleted_at' => null,
            ),
          ));
    }
}
