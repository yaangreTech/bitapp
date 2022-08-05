<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemestersSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('semesters')->insert(array (
            0 => 
            array (
              'level_id' => '1',
              'name' => 'S1',
              'label' => 'Semester 1',
            ),
            1 => 
            array (
              'level_id' => '1',
              'name' => 'S2',
              'label' => 'Semester 2',
            ),
            2 => 
            array (
              'level_id' => '2',
              'name' => 'S3',
              'label' => 'Semester 3',
            ),
            3 => 
            array (
              'level_id' => '2',
              'name' => 'S4',
              'label' => 'Semester 4',
            ),
            4 => 
            array (
              'level_id' => '3',
              'name' => 'S5',
              'label' => 'Semester 5',
            ),
            5 => 
            array (
              'level_id' => '3',
              'name' => 'S6',
              'label' => 'Semester 6',
            ),
            6 => 
            array (
              'level_id' => '4',
              'name' => 'S5',
              'label' => 'Semester 5',
            ),
            7 => 
            array (
              'level_id' => '4',
              'name' => 'S6',
              'label' => 'Semester 6',
            ),
            8 => 
            array (
              'level_id' => '5',
              'name' => 'S1',
              'label' => 'Semester 1',
            ),
            9 => 
            array (
              'level_id' => '5',
              'name' => 'S2',
              'label' => 'Semester 2',
            ),
            10 => 
            array (
              'level_id' => '6',
              'name' => 'S3',
              'label' => 'Semester 3',
            ),
            11 => 
            array (
              'level_id' => '6',
              'name' => 'S4',
              'label' => 'Semester 4',
            ),
            12 => 
            array (
              'level_id' => '7',
              'name' => 'S5',
              'label' => 'Semester 5',
            ),
            13 => 
            array (
              'level_id' => '7',
              'name' => 'S6',
              'label' => 'Semester 6',
            ),
            14 => 
            array (
              'level_id' => '8',
              'name' => 'S1',
              'label' => 'Semester 1',
            ),
            15 => 
            array (
              'level_id' => '8',
              'name' => 'S2',
              'label' => 'Semester 2',
            ),
            16 => 
            array (
              'level_id' => '9',
              'name' => 'S3',
              'label' => 'Semester 3',
            ),
            17 => 
            array (
              'level_id' => '9',
              'name' => 'S4',
              'label' => 'Semester 4',
            ),
            18 => 
            array (
              'level_id' => '10',
              'name' => 'S5',
              'label' => 'Semester 5',
            ),
            19 => 
            array (
              'level_id' => '10',
              'name' => 'S6',
              'label' => 'Semester 6',
            ),
          ));
    }
}
