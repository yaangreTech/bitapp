<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('levels')->insert(array (
            0 => 
            array (
              'branche_id' => '1',
              'name' => 'L1',
              'label' => 'Licence 1',
              'cycle' => 'licence',
            ),
            1 => 
            array (
              'branche_id' => '1',
              'name' => 'L2',
              'label' => 'Licence 2',
              'cycle' => 'licence',
            ),
            2 => 
            array (
              'branche_id' => '2',
              'name' => 'L3',
              'label' => 'Licence 3',
              'cycle' => 'licence',
            ),
            3 => 
            array (
              'branche_id' => '3',
              'name' => 'L3',
              'label' => 'Licence 3',
              'cycle' => 'licence',
            ),
            4 => 
            array (
              'branche_id' => '4',
              'name' => 'L1',
              'label' => 'Licence 1',
              'cycle' => 'licence',
            ),
            5 => 
            array (
              'branche_id' => '4',
              'name' => 'L2',
              'label' => 'Licence 2',
              'cycle' => 'licence',
            ),
            6 => 
            array (
              'branche_id' => '4',
              'name' => 'L3',
              'label' => 'Licence 3',
              'cycle' => 'licence',
            ),
            7 => 
            array (
              'branche_id' => '5',
              'name' => 'L1',
              'label' => 'Licence 1',
              'cycle' => 'licence',
            ),
            8 => 
            array (
              'branche_id' => '5',
              'name' => 'L2',
              'label' => 'Licence 2',
              'cycle' => 'licence',
            ),
            9 => 
            array (
              'branche_id' => '5',
              'name' => 'L3',
              'label' => 'Licence 3',
              'cycle' => 'licence',
            ),
          ));
    }
}
