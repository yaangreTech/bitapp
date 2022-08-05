<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartementSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('departements')->insert(array(
            array(
              'name' => 'CS_Department',
              'label' => 'Computer Sciences',
              'created_at' => '12/07/2022 11:30',
              'updated_at' => '12/07/2022 11:30'
            ),
            array(
              'name' => 'EE_Department',
              'label' => 'Electrical Engineering',
              'created_at' => '12/07/2022 11:32',
              'updated_at' => '12/07/2022 11:32'
            ),
            array(
              'name' => 'ME_Department',
              'label' => 'Mechanical Engineering',
              'created_at' => '12/07/2022 11:32',
              'updated_at' => '12/07/2022 11:32'
            )
          ));
    }
}
