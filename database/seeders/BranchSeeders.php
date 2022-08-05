<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('branches')->insert(array (
            0 => 
            array (
              'name' => 'Mines / Agriculture',
              'departement_id' => '3',
              'created_at' => '2022-07-12 11:33:10',
              'updated_at' => '2022-07-12 11:33:10',
            ),
            1 => 
            array (
              'name' => 'Mines',
              'departement_id' => '3',
              'created_at' => '2022-07-12 11:34:10',
              'updated_at' => '2022-07-12 11:34:10',
            ),
            2 => 
            array (
              'name' => 'Agriculture',
              'departement_id' => '3',
              'created_at' => '2022-07-12 11:34:07',
              'updated_at' => '2022-07-12 11:34:33',
            ),
            3 => 
            array (
              'name' => 'Renewable energies',
              'departement_id' => '2',
              'created_at' => '2022-07-12 11:37:47',
              'updated_at' => '2022-07-12 11:37:47',
            ),
            4 => 
            array (
              'name' => 'Computer science and Entrepreneurship',
              'departement_id' => '1',
              'created_at' => '2022-07-12 11:39:10',
              'updated_at' => '2022-07-12 11:39:10',
            ),
          ));
    }
}
