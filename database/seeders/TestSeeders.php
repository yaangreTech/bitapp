<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tests')->insert(array (
            0 => 
            array (
              'module_id' => '55',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '12/07/2022 16:09',
              'updated_at' => '12/07/2022 16:09',
            ),
            1 => 
            array (
              'module_id' => '55',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '12/07/2022 16:09',
              'updated_at' => '12/07/2022 16:09',
            ),
            2 => 
            array (
              'module_id' => '55',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '12/07/2022 16:09',
              'updated_at' => '12/07/2022 16:09',
            ),
            3 => 
            array (
              'module_id' => '69',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '14/07/2022 16:21',
              'updated_at' => '14/07/2022 16:21',
            ),
            4 => 
            array (
              'module_id' => '69',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '14/07/2022 16:21',
              'updated_at' => '14/07/2022 16:21',
            ),
            5 => 
            array (
              'module_id' => '69',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '45',
              'type' => 'normal',
              'created_at' => '14/07/2022 16:21',
              'updated_at' => '14/07/2022 16:21',
            ),
            6 => 
            array (
              'module_id' => '69',
              'year_id' => '3',
              'title' => 'Test#2',
              'ratio' => '45',
              'type' => 'normal',
              'created_at' => '14/07/2022 16:22',
              'updated_at' => '14/07/2022 16:22',
            ),
            7 => 
            array (
              'module_id' => '68',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '14/07/2022 16:23',
              'updated_at' => '14/07/2022 16:23',
            ),
            8 => 
            array (
              'module_id' => '68',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '14/07/2022 16:23',
              'updated_at' => '14/07/2022 16:23',
            ),
            9 => 
            array (
              'module_id' => '68',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '45',
              'type' => 'normal',
              'created_at' => '14/07/2022 16:23',
              'updated_at' => '14/07/2022 16:23',
            ),
            10 => 
            array (
              'module_id' => '68',
              'year_id' => '3',
              'title' => 'Test#2',
              'ratio' => '45',
              'type' => 'normal',
              'created_at' => '14/07/2022 16:23',
              'updated_at' => '14/07/2022 16:23',
            ),
            11 => 
            array (
              'module_id' => '79',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '14/07/2022 16:25',
              'updated_at' => '14/07/2022 16:25',
            ),
            12 => 
            array (
              'module_id' => '79',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '14/07/2022 16:25',
              'updated_at' => '14/07/2022 16:25',
            ),
            13 => 
            array (
              'module_id' => '79',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '14/07/2022 16:25',
              'updated_at' => '14/07/2022 16:25',
            ),
            14 => 
            array (
              'module_id' => '72',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '14/07/2022 16:29',
              'updated_at' => '14/07/2022 16:29',
            ),
            15 => 
            array (
              'module_id' => '72',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '14/07/2022 16:29',
              'updated_at' => '14/07/2022 16:29',
            ),
            16 => 
            array (
              'module_id' => '72',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '14/07/2022 16:29',
              'updated_at' => '14/07/2022 16:29',
            ),
            17 => 
            array (
              'module_id' => '80',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '14/07/2022 16:30',
              'updated_at' => '14/07/2022 16:30',
            ),
            18 => 
            array (
              'module_id' => '80',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '14/07/2022 16:30',
              'updated_at' => '14/07/2022 16:30',
            ),
            19 => 
            array (
              'module_id' => '80',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '60',
              'type' => 'normal',
              'created_at' => '14/07/2022 16:30',
              'updated_at' => '14/07/2022 16:30',
            ),
            20 => 
            array (
              'module_id' => '80',
              'year_id' => '3',
              'title' => 'Test#2',
              'ratio' => '30',
              'type' => 'normal',
              'created_at' => '14/07/2022 16:31',
              'updated_at' => '14/07/2022 16:31',
            ),
            21 => 
            array (
              'module_id' => '71',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '14/07/2022 16:33',
              'updated_at' => '14/07/2022 16:33',
            ),
            22 => 
            array (
              'module_id' => '71',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '14/07/2022 16:33',
              'updated_at' => '14/07/2022 16:33',
            ),
            23 => 
            array (
              'module_id' => '71',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '14/07/2022 16:33',
              'updated_at' => '14/07/2022 16:33',
            ),
            24 => 
            array (
              'module_id' => '77',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '14/07/2022 16:34',
              'updated_at' => '14/07/2022 16:34',
            ),
            25 => 
            array (
              'module_id' => '77',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '14/07/2022 16:34',
              'updated_at' => '14/07/2022 16:34',
            ),
            26 => 
            array (
              'module_id' => '77',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '30',
              'type' => 'normal',
              'created_at' => '14/07/2022 16:34',
              'updated_at' => '14/07/2022 16:36',
            ),
            27 => 
            array (
              'module_id' => '77',
              'year_id' => '3',
              'title' => 'Test#2',
              'ratio' => '60',
              'type' => 'normal',
              'created_at' => '14/07/2022 16:36',
              'updated_at' => '14/07/2022 16:36',
            ),
            28 => 
            array (
              'module_id' => '56',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '15/07/2022 11:08',
              'updated_at' => '15/07/2022 11:08',
            ),
            29 => 
            array (
              'module_id' => '56',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '15/07/2022 11:08',
              'updated_at' => '15/07/2022 11:08',
            ),
            30 => 
            array (
              'module_id' => '56',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '40',
              'type' => 'normal',
              'created_at' => '15/07/2022 11:08',
              'updated_at' => '15/07/2022 11:08',
            ),
            31 => 
            array (
              'module_id' => '56',
              'year_id' => '3',
              'title' => 'Test#2',
              'ratio' => '50',
              'type' => 'normal',
              'created_at' => '15/07/2022 11:08',
              'updated_at' => '15/07/2022 11:08',
            ),
            32 => 
            array (
              'module_id' => '57',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '15/07/2022 11:19',
              'updated_at' => '15/07/2022 11:19',
            ),
            33 => 
            array (
              'module_id' => '57',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '15/07/2022 11:19',
              'updated_at' => '15/07/2022 11:19',
            ),
            34 => 
            array (
              'module_id' => '57',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '45',
              'type' => 'normal',
              'created_at' => '15/07/2022 11:19',
              'updated_at' => '15/07/2022 11:19',
            ),
            35 => 
            array (
              'module_id' => '57',
              'year_id' => '3',
              'title' => 'Test#2',
              'ratio' => '45',
              'type' => 'normal',
              'created_at' => '15/07/2022 11:19',
              'updated_at' => '15/07/2022 11:19',
            ),
            36 => 
            array (
              'module_id' => '58',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '15/07/2022 11:28',
              'updated_at' => '15/07/2022 11:28',
            ),
            37 => 
            array (
              'module_id' => '58',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '15/07/2022 11:28',
              'updated_at' => '15/07/2022 11:28',
            ),
            38 => 
            array (
              'module_id' => '58',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '15/07/2022 11:28',
              'updated_at' => '15/07/2022 11:28',
            ),
            39 => 
            array (
              'module_id' => '59',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '15/07/2022 11:35',
              'updated_at' => '15/07/2022 11:35',
            ),
            40 => 
            array (
              'module_id' => '59',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '15/07/2022 11:35',
              'updated_at' => '15/07/2022 11:35',
            ),
            41 => 
            array (
              'module_id' => '59',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '15/07/2022 11:35',
              'updated_at' => '15/07/2022 11:35',
            ),
            42 => 
            array (
              'module_id' => '60',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '15/07/2022 11:42',
              'updated_at' => '15/07/2022 11:42',
            ),
            43 => 
            array (
              'module_id' => '60',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '15/07/2022 11:42',
              'updated_at' => '15/07/2022 11:42',
            ),
            44 => 
            array (
              'module_id' => '60',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '15/07/2022 11:42',
              'updated_at' => '15/07/2022 11:42',
            ),
            45 => 
            array (
              'module_id' => '61',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '15/07/2022 14:10',
              'updated_at' => '15/07/2022 14:10',
            ),
            46 => 
            array (
              'module_id' => '61',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '15/07/2022 14:10',
              'updated_at' => '15/07/2022 14:10',
            ),
            47 => 
            array (
              'module_id' => '61',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '30',
              'type' => 'normal',
              'created_at' => '15/07/2022 14:10',
              'updated_at' => '15/07/2022 14:10',
            ),
            48 => 
            array (
              'module_id' => '61',
              'year_id' => '3',
              'title' => 'Test#2',
              'ratio' => '60',
              'type' => 'normal',
              'created_at' => '15/07/2022 14:10',
              'updated_at' => '15/07/2022 14:10',
            ),
            49 => 
            array (
              'module_id' => '62',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '15/07/2022 14:35',
              'updated_at' => '15/07/2022 14:35',
            ),
            50 => 
            array (
              'module_id' => '62',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '15/07/2022 14:35',
              'updated_at' => '15/07/2022 14:35',
            ),
            51 => 
            array (
              'module_id' => '62',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '15/07/2022 14:35',
              'updated_at' => '15/07/2022 14:35',
            ),
            52 => 
            array (
              'module_id' => '63',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '15/07/2022 14:46',
              'updated_at' => '15/07/2022 14:46',
            ),
            53 => 
            array (
              'module_id' => '63',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '15/07/2022 14:46',
              'updated_at' => '15/07/2022 14:46',
            ),
            54 => 
            array (
              'module_id' => '63',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '15/07/2022 14:46',
              'updated_at' => '15/07/2022 14:46',
            ),
            55 => 
            array (
              'module_id' => '64',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '18/07/2022 09:31',
              'updated_at' => '18/07/2022 09:31',
            ),
            56 => 
            array (
              'module_id' => '64',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '18/07/2022 09:31',
              'updated_at' => '18/07/2022 09:31',
            ),
            57 => 
            array (
              'module_id' => '64',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '40',
              'type' => 'normal',
              'created_at' => '18/07/2022 09:31',
              'updated_at' => '18/07/2022 09:31',
            ),
            58 => 
            array (
              'module_id' => '64',
              'year_id' => '3',
              'title' => 'Test#2',
              'ratio' => '50',
              'type' => 'normal',
              'created_at' => '18/07/2022 09:32',
              'updated_at' => '18/07/2022 09:32',
            ),
            59 => 
            array (
              'module_id' => '66',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '18/07/2022 09:39',
              'updated_at' => '18/07/2022 09:39',
            ),
            60 => 
            array (
              'module_id' => '66',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '18/07/2022 09:39',
              'updated_at' => '18/07/2022 09:39',
            ),
            61 => 
            array (
              'module_id' => '66',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '18/07/2022 09:39',
              'updated_at' => '18/07/2022 09:39',
            ),
            62 => 
            array (
              'module_id' => '67',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '18/07/2022 09:47',
              'updated_at' => '18/07/2022 09:47',
            ),
            63 => 
            array (
              'module_id' => '67',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '18/07/2022 09:47',
              'updated_at' => '18/07/2022 09:47',
            ),
            64 => 
            array (
              'module_id' => '67',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '18/07/2022 09:47',
              'updated_at' => '18/07/2022 09:47',
            ),
            65 => 
            array (
              'module_id' => '65',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '18/07/2022 09:54',
              'updated_at' => '18/07/2022 09:54',
            ),
            66 => 
            array (
              'module_id' => '65',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '18/07/2022 09:54',
              'updated_at' => '18/07/2022 09:54',
            ),
            67 => 
            array (
              'module_id' => '65',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '18/07/2022 09:54',
              'updated_at' => '18/07/2022 09:54',
            ),
            68 => 
            array (
              'module_id' => '76',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '18/07/2022 10:04',
              'updated_at' => '18/07/2022 10:04',
            ),
            69 => 
            array (
              'module_id' => '76',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '18/07/2022 10:04',
              'updated_at' => '18/07/2022 10:04',
            ),
            70 => 
            array (
              'module_id' => '76',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '40',
              'type' => 'normal',
              'created_at' => '18/07/2022 10:04',
              'updated_at' => '18/07/2022 10:04',
            ),
            71 => 
            array (
              'module_id' => '76',
              'year_id' => '3',
              'title' => 'Test#2',
              'ratio' => '50',
              'type' => 'normal',
              'created_at' => '18/07/2022 10:04',
              'updated_at' => '18/07/2022 10:04',
            ),
            72 => 
            array (
              'module_id' => '75',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '18/07/2022 10:16',
              'updated_at' => '18/07/2022 10:16',
            ),
            73 => 
            array (
              'module_id' => '75',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '18/07/2022 10:16',
              'updated_at' => '18/07/2022 10:16',
            ),
            74 => 
            array (
              'module_id' => '75',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '18/07/2022 10:16',
              'updated_at' => '18/07/2022 10:16',
            ),
            75 => 
            array (
              'module_id' => '70',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '18/07/2022 10:27',
              'updated_at' => '18/07/2022 10:27',
            ),
            76 => 
            array (
              'module_id' => '70',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '18/07/2022 10:27',
              'updated_at' => '18/07/2022 10:27',
            ),
            77 => 
            array (
              'module_id' => '70',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '18/07/2022 10:27',
              'updated_at' => '18/07/2022 10:27',
            ),
            78 => 
            array (
              'module_id' => '15',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '18/07/2022 10:54',
              'updated_at' => '18/07/2022 10:54',
            ),
            79 => 
            array (
              'module_id' => '15',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '18/07/2022 10:54',
              'updated_at' => '18/07/2022 10:54',
            ),
            80 => 
            array (
              'module_id' => '15',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '45',
              'type' => 'normal',
              'created_at' => '18/07/2022 10:54',
              'updated_at' => '18/07/2022 10:54',
            ),
            81 => 
            array (
              'module_id' => '15',
              'year_id' => '3',
              'title' => 'Test#2',
              'ratio' => '45',
              'type' => 'normal',
              'created_at' => '18/07/2022 10:54',
              'updated_at' => '18/07/2022 10:54',
            ),
            82 => 
            array (
              'module_id' => '14',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '18/07/2022 11:21',
              'updated_at' => '18/07/2022 11:21',
            ),
            83 => 
            array (
              'module_id' => '14',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '18/07/2022 11:21',
              'updated_at' => '18/07/2022 11:21',
            ),
            84 => 
            array (
              'module_id' => '14',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '45',
              'type' => 'normal',
              'created_at' => '18/07/2022 11:21',
              'updated_at' => '18/07/2022 11:21',
            ),
            85 => 
            array (
              'module_id' => '14',
              'year_id' => '3',
              'title' => 'Test#2',
              'ratio' => '45',
              'type' => 'normal',
              'created_at' => '18/07/2022 11:21',
              'updated_at' => '18/07/2022 11:21',
            ),
            86 => 
            array (
              'module_id' => '16',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '18/07/2022 11:38',
              'updated_at' => '18/07/2022 11:38',
            ),
            87 => 
            array (
              'module_id' => '16',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '18/07/2022 11:38',
              'updated_at' => '18/07/2022 11:38',
            ),
            88 => 
            array (
              'module_id' => '16',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '18/07/2022 11:38',
              'updated_at' => '18/07/2022 11:38',
            ),
            89 => 
            array (
              'module_id' => '17',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '18/07/2022 11:47',
              'updated_at' => '18/07/2022 11:47',
            ),
            90 => 
            array (
              'module_id' => '17',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '18/07/2022 11:47',
              'updated_at' => '18/07/2022 11:47',
            ),
            91 => 
            array (
              'module_id' => '17',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '18/07/2022 11:47',
              'updated_at' => '18/07/2022 11:47',
            ),
            92 => 
            array (
              'module_id' => '18',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '18/07/2022 11:54',
              'updated_at' => '18/07/2022 11:54',
            ),
            93 => 
            array (
              'module_id' => '18',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '18/07/2022 11:54',
              'updated_at' => '18/07/2022 11:54',
            ),
            94 => 
            array (
              'module_id' => '18',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '18/07/2022 11:54',
              'updated_at' => '18/07/2022 11:54',
            ),
            95 => 
            array (
              'module_id' => '24',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '18/07/2022 12:05',
              'updated_at' => '18/07/2022 12:05',
            ),
            96 => 
            array (
              'module_id' => '24',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '18/07/2022 12:05',
              'updated_at' => '18/07/2022 12:05',
            ),
            97 => 
            array (
              'module_id' => '24',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '18/07/2022 12:05',
              'updated_at' => '18/07/2022 12:05',
            ),
            98 => 
            array (
              'module_id' => '23',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '18/07/2022 12:11',
              'updated_at' => '18/07/2022 12:11',
            ),
            99 => 
            array (
              'module_id' => '23',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '18/07/2022 12:11',
              'updated_at' => '18/07/2022 12:11',
            ),
            100 => 
            array (
              'module_id' => '23',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '18/07/2022 12:11',
              'updated_at' => '18/07/2022 12:11',
            ),
            101 => 
            array (
              'module_id' => '25',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 09:22',
              'updated_at' => '19/07/2022 09:22',
            ),
            102 => 
            array (
              'module_id' => '25',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 09:22',
              'updated_at' => '19/07/2022 09:22',
            ),
            103 => 
            array (
              'module_id' => '19',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 09:39',
              'updated_at' => '19/07/2022 09:39',
            ),
            104 => 
            array (
              'module_id' => '19',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 09:39',
              'updated_at' => '19/07/2022 09:39',
            ),
            105 => 
            array (
              'module_id' => '19',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '19/07/2022 09:39',
              'updated_at' => '19/07/2022 09:39',
            ),
            106 => 
            array (
              'module_id' => '73',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 10:11',
              'updated_at' => '19/07/2022 10:11',
            ),
            107 => 
            array (
              'module_id' => '73',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 10:11',
              'updated_at' => '19/07/2022 10:11',
            ),
            108 => 
            array (
              'module_id' => '73',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '45',
              'type' => 'normal',
              'created_at' => '19/07/2022 10:11',
              'updated_at' => '19/07/2022 10:11',
            ),
            109 => 
            array (
              'module_id' => '73',
              'year_id' => '3',
              'title' => 'Test#2',
              'ratio' => '45',
              'type' => 'normal',
              'created_at' => '19/07/2022 10:11',
              'updated_at' => '19/07/2022 10:11',
            ),
            110 => 
            array (
              'module_id' => '1',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 10:31',
              'updated_at' => '19/07/2022 10:31',
            ),
            111 => 
            array (
              'module_id' => '1',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 10:31',
              'updated_at' => '19/07/2022 10:31',
            ),
            112 => 
            array (
              'module_id' => '1',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '40',
              'type' => 'normal',
              'created_at' => '19/07/2022 10:31',
              'updated_at' => '19/07/2022 10:31',
            ),
            113 => 
            array (
              'module_id' => '1',
              'year_id' => '3',
              'title' => 'Test#2',
              'ratio' => '50',
              'type' => 'normal',
              'created_at' => '19/07/2022 10:31',
              'updated_at' => '19/07/2022 10:31',
            ),
            114 => 
            array (
              'module_id' => '2',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 11:03',
              'updated_at' => '19/07/2022 11:03',
            ),
            115 => 
            array (
              'module_id' => '2',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 11:03',
              'updated_at' => '19/07/2022 11:03',
            ),
            116 => 
            array (
              'module_id' => '2',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '45',
              'type' => 'normal',
              'created_at' => '19/07/2022 11:03',
              'updated_at' => '19/07/2022 11:03',
            ),
            117 => 
            array (
              'module_id' => '2',
              'year_id' => '3',
              'title' => 'Test#2',
              'ratio' => '45',
              'type' => 'normal',
              'created_at' => '19/07/2022 11:03',
              'updated_at' => '19/07/2022 11:03',
            ),
            118 => 
            array (
              'module_id' => '3',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 11:10',
              'updated_at' => '19/07/2022 11:10',
            ),
            119 => 
            array (
              'module_id' => '3',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 11:10',
              'updated_at' => '19/07/2022 11:10',
            ),
            120 => 
            array (
              'module_id' => '3',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '19/07/2022 11:10',
              'updated_at' => '19/07/2022 11:10',
            ),
            121 => 
            array (
              'module_id' => '78',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 11:10',
              'updated_at' => '19/07/2022 11:10',
            ),
            122 => 
            array (
              'module_id' => '78',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 11:10',
              'updated_at' => '19/07/2022 11:10',
            ),
            123 => 
            array (
              'module_id' => '78',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '19/07/2022 11:10',
              'updated_at' => '19/07/2022 11:10',
            ),
            124 => 
            array (
              'module_id' => '4',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 11:19',
              'updated_at' => '19/07/2022 11:19',
            ),
            125 => 
            array (
              'module_id' => '4',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 11:19',
              'updated_at' => '19/07/2022 11:19',
            ),
            126 => 
            array (
              'module_id' => '4',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '19/07/2022 11:19',
              'updated_at' => '19/07/2022 11:19',
            ),
            127 => 
            array (
              'module_id' => '5',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 11:37',
              'updated_at' => '19/07/2022 11:37',
            ),
            128 => 
            array (
              'module_id' => '5',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 11:37',
              'updated_at' => '19/07/2022 11:37',
            ),
            129 => 
            array (
              'module_id' => '5',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '19/07/2022 11:37',
              'updated_at' => '19/07/2022 11:37',
            ),
            130 => 
            array (
              'module_id' => '6',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 11:43',
              'updated_at' => '19/07/2022 11:43',
            ),
            131 => 
            array (
              'module_id' => '6',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 11:43',
              'updated_at' => '19/07/2022 11:43',
            ),
            132 => 
            array (
              'module_id' => '6',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '19/07/2022 11:43',
              'updated_at' => '19/07/2022 11:43',
            ),
            133 => 
            array (
              'module_id' => '138',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 11:49',
              'updated_at' => '19/07/2022 11:49',
            ),
            134 => 
            array (
              'module_id' => '138',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 11:49',
              'updated_at' => '19/07/2022 11:49',
            ),
            135 => 
            array (
              'module_id' => '138',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '19/07/2022 11:49',
              'updated_at' => '19/07/2022 11:49',
            ),
            136 => 
            array (
              'module_id' => '7',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 11:51',
              'updated_at' => '19/07/2022 11:51',
            ),
            137 => 
            array (
              'module_id' => '7',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 11:51',
              'updated_at' => '19/07/2022 11:51',
            ),
            138 => 
            array (
              'module_id' => '7',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '19/07/2022 11:51',
              'updated_at' => '19/07/2022 11:51',
            ),
            139 => 
            array (
              'module_id' => '9',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 11:57',
              'updated_at' => '19/07/2022 11:57',
            ),
            140 => 
            array (
              'module_id' => '9',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 11:57',
              'updated_at' => '19/07/2022 11:57',
            ),
            141 => 
            array (
              'module_id' => '9',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '19/07/2022 11:57',
              'updated_at' => '19/07/2022 11:57',
            ),
            142 => 
            array (
              'module_id' => '10',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 12:05',
              'updated_at' => '19/07/2022 12:05',
            ),
            143 => 
            array (
              'module_id' => '10',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 12:05',
              'updated_at' => '19/07/2022 12:05',
            ),
            144 => 
            array (
              'module_id' => '10',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '19/07/2022 12:05',
              'updated_at' => '19/07/2022 12:05',
            ),
            145 => 
            array (
              'module_id' => '11',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 12:12',
              'updated_at' => '19/07/2022 12:12',
            ),
            146 => 
            array (
              'module_id' => '11',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 12:12',
              'updated_at' => '19/07/2022 12:12',
            ),
            147 => 
            array (
              'module_id' => '11',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '19/07/2022 12:12',
              'updated_at' => '19/07/2022 12:12',
            ),
            148 => 
            array (
              'module_id' => '12',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 12:18',
              'updated_at' => '19/07/2022 12:18',
            ),
            149 => 
            array (
              'module_id' => '12',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 12:18',
              'updated_at' => '19/07/2022 12:18',
            ),
            150 => 
            array (
              'module_id' => '12',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '19/07/2022 12:18',
              'updated_at' => '19/07/2022 12:18',
            ),
            151 => 
            array (
              'module_id' => '139',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 12:19',
              'updated_at' => '19/07/2022 12:19',
            ),
            152 => 
            array (
              'module_id' => '139',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 12:19',
              'updated_at' => '19/07/2022 12:19',
            ),
            153 => 
            array (
              'module_id' => '139',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '19/07/2022 12:19',
              'updated_at' => '19/07/2022 12:19',
            ),
            154 => 
            array (
              'module_id' => '141',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 12:30',
              'updated_at' => '19/07/2022 12:30',
            ),
            155 => 
            array (
              'module_id' => '141',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 12:30',
              'updated_at' => '19/07/2022 12:30',
            ),
            156 => 
            array (
              'module_id' => '141',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '19/07/2022 12:30',
              'updated_at' => '19/07/2022 12:30',
            ),
            157 => 
            array (
              'module_id' => '42',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 12:32',
              'updated_at' => '19/07/2022 12:32',
            ),
            158 => 
            array (
              'module_id' => '42',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 12:32',
              'updated_at' => '19/07/2022 12:32',
            ),
            159 => 
            array (
              'module_id' => '42',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '19/07/2022 12:32',
              'updated_at' => '19/07/2022 12:32',
            ),
            160 => 
            array (
              'module_id' => '143',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 12:48',
              'updated_at' => '19/07/2022 12:48',
            ),
            161 => 
            array (
              'module_id' => '143',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 12:48',
              'updated_at' => '19/07/2022 12:48',
            ),
            162 => 
            array (
              'module_id' => '143',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '19/07/2022 12:48',
              'updated_at' => '19/07/2022 12:48',
            ),
            163 => 
            array (
              'module_id' => '44',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 12:50',
              'updated_at' => '19/07/2022 12:50',
            ),
            164 => 
            array (
              'module_id' => '44',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 12:50',
              'updated_at' => '19/07/2022 12:50',
            ),
            165 => 
            array (
              'module_id' => '44',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '60',
              'type' => 'normal',
              'created_at' => '19/07/2022 12:50',
              'updated_at' => '19/07/2022 12:50',
            ),
            166 => 
            array (
              'module_id' => '44',
              'year_id' => '3',
              'title' => 'Test#2',
              'ratio' => '30',
              'type' => 'normal',
              'created_at' => '19/07/2022 12:51',
              'updated_at' => '19/07/2022 12:51',
            ),
            167 => 
            array (
              'module_id' => '144',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 14:21',
              'updated_at' => '19/07/2022 14:21',
            ),
            168 => 
            array (
              'module_id' => '144',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 14:21',
              'updated_at' => '19/07/2022 14:21',
            ),
            169 => 
            array (
              'module_id' => '144',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '19/07/2022 14:21',
              'updated_at' => '19/07/2022 14:21',
            ),
            170 => 
            array (
              'module_id' => '145',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 14:28',
              'updated_at' => '19/07/2022 14:28',
            ),
            171 => 
            array (
              'module_id' => '145',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 14:28',
              'updated_at' => '19/07/2022 14:28',
            ),
            172 => 
            array (
              'module_id' => '145',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '30',
              'type' => 'normal',
              'created_at' => '19/07/2022 14:28',
              'updated_at' => '19/07/2022 14:28',
            ),
            173 => 
            array (
              'module_id' => '145',
              'year_id' => '3',
              'title' => 'Test#2',
              'ratio' => '30',
              'type' => 'normal',
              'created_at' => '19/07/2022 14:28',
              'updated_at' => '19/07/2022 14:28',
            ),
            174 => 
            array (
              'module_id' => '145',
              'year_id' => '3',
              'title' => 'Test#3',
              'ratio' => '30',
              'type' => 'normal',
              'created_at' => '19/07/2022 14:28',
              'updated_at' => '19/07/2022 14:28',
            ),
            175 => 
            array (
              'module_id' => '146',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 14:36',
              'updated_at' => '19/07/2022 14:36',
            ),
            176 => 
            array (
              'module_id' => '146',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 14:36',
              'updated_at' => '19/07/2022 14:36',
            ),
            177 => 
            array (
              'module_id' => '146',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '40',
              'type' => 'normal',
              'created_at' => '19/07/2022 14:36',
              'updated_at' => '19/07/2022 14:36',
            ),
            178 => 
            array (
              'module_id' => '146',
              'year_id' => '3',
              'title' => 'Test#2',
              'ratio' => '50',
              'type' => 'normal',
              'created_at' => '19/07/2022 14:36',
              'updated_at' => '19/07/2022 14:36',
            ),
            179 => 
            array (
              'module_id' => '147',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 14:43',
              'updated_at' => '19/07/2022 14:43',
            ),
            180 => 
            array (
              'module_id' => '147',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 14:43',
              'updated_at' => '19/07/2022 14:43',
            ),
            181 => 
            array (
              'module_id' => '147',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '19/07/2022 14:43',
              'updated_at' => '19/07/2022 14:43',
            ),
            182 => 
            array (
              'module_id' => '45',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 14:58',
              'updated_at' => '19/07/2022 14:58',
            ),
            183 => 
            array (
              'module_id' => '45',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 14:58',
              'updated_at' => '19/07/2022 14:58',
            ),
            184 => 
            array (
              'module_id' => '149',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 15:10',
              'updated_at' => '19/07/2022 15:10',
            ),
            185 => 
            array (
              'module_id' => '149',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 15:10',
              'updated_at' => '19/07/2022 15:10',
            ),
            186 => 
            array (
              'module_id' => '148',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 15:18',
              'updated_at' => '19/07/2022 15:18',
            ),
            187 => 
            array (
              'module_id' => '148',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 15:18',
              'updated_at' => '19/07/2022 15:18',
            ),
            188 => 
            array (
              'module_id' => '148',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '50',
              'type' => 'normal',
              'created_at' => '19/07/2022 15:18',
              'updated_at' => '19/07/2022 15:18',
            ),
            189 => 
            array (
              'module_id' => '148',
              'year_id' => '3',
              'title' => 'Test#2',
              'ratio' => '40',
              'type' => 'normal',
              'created_at' => '19/07/2022 15:18',
              'updated_at' => '19/07/2022 15:18',
            ),
            190 => 
            array (
              'module_id' => '46',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 15:58',
              'updated_at' => '19/07/2022 15:58',
            ),
            191 => 
            array (
              'module_id' => '46',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 15:58',
              'updated_at' => '19/07/2022 15:58',
            ),
            192 => 
            array (
              'module_id' => '46',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '40',
              'type' => 'normal',
              'created_at' => '19/07/2022 15:58',
              'updated_at' => '19/07/2022 15:58',
            ),
            193 => 
            array (
              'module_id' => '46',
              'year_id' => '3',
              'title' => 'Test#2',
              'ratio' => '50',
              'type' => 'normal',
              'created_at' => '19/07/2022 15:58',
              'updated_at' => '19/07/2022 15:58',
            ),
            194 => 
            array (
              'module_id' => '74',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 16:25',
              'updated_at' => '19/07/2022 16:25',
            ),
            195 => 
            array (
              'module_id' => '74',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 16:25',
              'updated_at' => '19/07/2022 16:25',
            ),
            196 => 
            array (
              'module_id' => '74',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '19/07/2022 16:25',
              'updated_at' => '19/07/2022 16:25',
            ),
            197 => 
            array (
              'module_id' => '47',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 16:31',
              'updated_at' => '19/07/2022 16:31',
            ),
            198 => 
            array (
              'module_id' => '47',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 16:31',
              'updated_at' => '19/07/2022 16:31',
            ),
            199 => 
            array (
              'module_id' => '47',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '40',
              'type' => 'normal',
              'created_at' => '19/07/2022 16:31',
              'updated_at' => '19/07/2022 16:31',
            ),
            200 => 
            array (
              'module_id' => '47',
              'year_id' => '3',
              'title' => 'Test#2',
              'ratio' => '50',
              'type' => 'normal',
              'created_at' => '19/07/2022 16:31',
              'updated_at' => '19/07/2022 16:31',
            ),
            201 => 
            array (
              'module_id' => '48',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 16:39',
              'updated_at' => '19/07/2022 16:39',
            ),
            202 => 
            array (
              'module_id' => '48',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 16:39',
              'updated_at' => '19/07/2022 16:39',
            ),
            203 => 
            array (
              'module_id' => '48',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '19/07/2022 16:39',
              'updated_at' => '19/07/2022 16:39',
            ),
            204 => 
            array (
              'module_id' => '49',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 18:33',
              'updated_at' => '19/07/2022 18:33',
            ),
            205 => 
            array (
              'module_id' => '49',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 18:33',
              'updated_at' => '19/07/2022 18:33',
            ),
            206 => 
            array (
              'module_id' => '49',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '19/07/2022 18:33',
              'updated_at' => '19/07/2022 18:33',
            ),
            207 => 
            array (
              'module_id' => '50',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 18:41',
              'updated_at' => '19/07/2022 18:41',
            ),
            208 => 
            array (
              'module_id' => '50',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '19/07/2022 18:41',
              'updated_at' => '19/07/2022 18:41',
            ),
            209 => 
            array (
              'module_id' => '52',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 11:51',
              'updated_at' => '20/07/2022 11:51',
            ),
            210 => 
            array (
              'module_id' => '52',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 11:51',
              'updated_at' => '20/07/2022 11:51',
            ),
            211 => 
            array (
              'module_id' => '52',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '20/07/2022 11:51',
              'updated_at' => '20/07/2022 11:51',
            ),
            212 => 
            array (
              'module_id' => '53',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 11:58',
              'updated_at' => '20/07/2022 11:58',
            ),
            213 => 
            array (
              'module_id' => '53',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 11:58',
              'updated_at' => '20/07/2022 11:58',
            ),
            214 => 
            array (
              'module_id' => '53',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '20/07/2022 11:58',
              'updated_at' => '20/07/2022 11:58',
            ),
            215 => 
            array (
              'module_id' => '51',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 12:03',
              'updated_at' => '20/07/2022 12:03',
            ),
            216 => 
            array (
              'module_id' => '51',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 12:03',
              'updated_at' => '20/07/2022 12:03',
            ),
            217 => 
            array (
              'module_id' => '51',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '20/07/2022 12:03',
              'updated_at' => '20/07/2022 12:03',
            ),
            218 => 
            array (
              'module_id' => '45',
              'year_id' => '3',
              'title' => 'Test#2',
              'ratio' => '25',
              'type' => 'normal',
              'created_at' => '19/07/2022 14:58',
              'updated_at' => '20/07/2022 12:30',
            ),
            219 => 
            array (
              'module_id' => '45',
              'year_id' => '3',
              'title' => 'Test#3',
              'ratio' => '50',
              'type' => 'normal',
              'created_at' => '19/07/2022 14:58',
              'updated_at' => '21/07/2022 11:53',
            ),
            220 => 
            array (
              'module_id' => '123',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 14:36',
              'updated_at' => '20/07/2022 14:36',
            ),
            221 => 
            array (
              'module_id' => '123',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 14:36',
              'updated_at' => '20/07/2022 14:36',
            ),
            222 => 
            array (
              'module_id' => '123',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '60',
              'type' => 'normal',
              'created_at' => '20/07/2022 14:36',
              'updated_at' => '20/07/2022 14:36',
            ),
            223 => 
            array (
              'module_id' => '123',
              'year_id' => '3',
              'title' => 'Test#2',
              'ratio' => '30',
              'type' => 'normal',
              'created_at' => '20/07/2022 14:36',
              'updated_at' => '20/07/2022 14:36',
            ),
            224 => 
            array (
              'module_id' => '111',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 14:50',
              'updated_at' => '20/07/2022 14:50',
            ),
            225 => 
            array (
              'module_id' => '111',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 14:50',
              'updated_at' => '20/07/2022 14:50',
            ),
            226 => 
            array (
              'module_id' => '111',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '45',
              'type' => 'normal',
              'created_at' => '20/07/2022 14:50',
              'updated_at' => '20/07/2022 14:50',
            ),
            227 => 
            array (
              'module_id' => '111',
              'year_id' => '3',
              'title' => 'Test#2',
              'ratio' => '45',
              'type' => 'normal',
              'created_at' => '20/07/2022 14:50',
              'updated_at' => '20/07/2022 14:50',
            ),
            228 => 
            array (
              'module_id' => '112',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 15:18',
              'updated_at' => '20/07/2022 15:18',
            ),
            229 => 
            array (
              'module_id' => '112',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 15:18',
              'updated_at' => '20/07/2022 15:18',
            ),
            230 => 
            array (
              'module_id' => '112',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '45',
              'type' => 'normal',
              'created_at' => '20/07/2022 15:18',
              'updated_at' => '20/07/2022 15:18',
            ),
            231 => 
            array (
              'module_id' => '122',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 15:19',
              'updated_at' => '20/07/2022 15:19',
            ),
            232 => 
            array (
              'module_id' => '122',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 15:19',
              'updated_at' => '20/07/2022 15:19',
            ),
            233 => 
            array (
              'module_id' => '45',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '40',
              'type' => 'normal',
              'created_at' => '19/07/2022 14:58',
              'updated_at' => '21/07/2022 11:52',
            ),
            234 => 
            array (
              'module_id' => '149',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '40',
              'type' => 'normal',
              'created_at' => '19/07/2022 15:10',
              'updated_at' => '21/07/2022 17:08',
            ),
            235 => 
            array (
              'module_id' => '122',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '20/07/2022 15:19',
              'updated_at' => '20/07/2022 15:19',
            ),
            236 => 
            array (
              'module_id' => '112',
              'year_id' => '3',
              'title' => 'Test#2',
              'ratio' => '45',
              'type' => 'normal',
              'created_at' => '20/07/2022 15:19',
              'updated_at' => '20/07/2022 15:19',
            ),
            237 => 
            array (
              'module_id' => '121',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 15:32',
              'updated_at' => '20/07/2022 15:32',
            ),
            238 => 
            array (
              'module_id' => '121',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 15:32',
              'updated_at' => '20/07/2022 15:32',
            ),
            239 => 
            array (
              'module_id' => '121',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '20/07/2022 15:32',
              'updated_at' => '20/07/2022 15:32',
            ),
            240 => 
            array (
              'module_id' => '113',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 15:32',
              'updated_at' => '20/07/2022 15:32',
            ),
            241 => 
            array (
              'module_id' => '113',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 15:32',
              'updated_at' => '20/07/2022 15:32',
            ),
            242 => 
            array (
              'module_id' => '113',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '20/07/2022 15:32',
              'updated_at' => '20/07/2022 15:32',
            ),
            243 => 
            array (
              'module_id' => '120',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 15:43',
              'updated_at' => '20/07/2022 15:43',
            ),
            244 => 
            array (
              'module_id' => '120',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 15:43',
              'updated_at' => '20/07/2022 15:43',
            ),
            245 => 
            array (
              'module_id' => '120',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '20/07/2022 15:43',
              'updated_at' => '20/07/2022 15:43',
            ),
            246 => 
            array (
              'module_id' => '114',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 15:49',
              'updated_at' => '20/07/2022 15:49',
            ),
            247 => 
            array (
              'module_id' => '114',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 15:49',
              'updated_at' => '20/07/2022 15:49',
            ),
            248 => 
            array (
              'module_id' => '114',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '20/07/2022 15:49',
              'updated_at' => '20/07/2022 15:49',
            ),
            249 => 
            array (
              'module_id' => '118',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 15:51',
              'updated_at' => '20/07/2022 15:51',
            ),
            250 => 
            array (
              'module_id' => '118',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 15:51',
              'updated_at' => '20/07/2022 15:51',
            ),
            251 => 
            array (
              'module_id' => '118',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '40',
              'type' => 'normal',
              'created_at' => '20/07/2022 15:51',
              'updated_at' => '20/07/2022 15:51',
            ),
            252 => 
            array (
              'module_id' => '118',
              'year_id' => '3',
              'title' => 'Test#2',
              'ratio' => '50',
              'type' => 'normal',
              'created_at' => '20/07/2022 15:51',
              'updated_at' => '20/07/2022 15:51',
            ),
            253 => 
            array (
              'module_id' => '119',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 15:54',
              'updated_at' => '20/07/2022 15:54',
            ),
            254 => 
            array (
              'module_id' => '119',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 15:54',
              'updated_at' => '20/07/2022 15:54',
            ),
            255 => 
            array (
              'module_id' => '119',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '20/07/2022 15:54',
              'updated_at' => '20/07/2022 15:54',
            ),
            256 => 
            array (
              'module_id' => '116',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 15:59',
              'updated_at' => '20/07/2022 15:59',
            ),
            257 => 
            array (
              'module_id' => '116',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 15:59',
              'updated_at' => '20/07/2022 15:59',
            ),
            258 => 
            array (
              'module_id' => '116',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '20/07/2022 15:59',
              'updated_at' => '20/07/2022 15:59',
            ),
            259 => 
            array (
              'module_id' => '115',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 16:01',
              'updated_at' => '20/07/2022 16:01',
            ),
            260 => 
            array (
              'module_id' => '115',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 16:01',
              'updated_at' => '20/07/2022 16:01',
            ),
            261 => 
            array (
              'module_id' => '115',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '20/07/2022 16:01',
              'updated_at' => '20/07/2022 16:01',
            ),
            262 => 
            array (
              'module_id' => '117',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 16:10',
              'updated_at' => '20/07/2022 16:10',
            ),
            263 => 
            array (
              'module_id' => '117',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '20/07/2022 16:10',
              'updated_at' => '20/07/2022 16:10',
            ),
            264 => 
            array (
              'module_id' => '117',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '45',
              'type' => 'normal',
              'created_at' => '20/07/2022 16:10',
              'updated_at' => '20/07/2022 16:10',
            ),
            265 => 
            array (
              'module_id' => '117',
              'year_id' => '3',
              'title' => 'Test#2',
              'ratio' => '45',
              'type' => 'normal',
              'created_at' => '20/07/2022 16:10',
              'updated_at' => '20/07/2022 16:10',
            ),
            266 => 
            array (
              'module_id' => '20',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '21/07/2022 09:11',
              'updated_at' => '21/07/2022 09:11',
            ),
            267 => 
            array (
              'module_id' => '20',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '21/07/2022 09:11',
              'updated_at' => '21/07/2022 09:11',
            ),
            268 => 
            array (
              'module_id' => '20',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '21/07/2022 09:11',
              'updated_at' => '21/07/2022 09:11',
            ),
            269 => 
            array (
              'module_id' => '26',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '21/07/2022 09:28',
              'updated_at' => '21/07/2022 09:28',
            ),
            270 => 
            array (
              'module_id' => '26',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '21/07/2022 09:28',
              'updated_at' => '21/07/2022 09:28',
            ),
            271 => 
            array (
              'module_id' => '26',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '21/07/2022 09:28',
              'updated_at' => '21/07/2022 09:28',
            ),
            272 => 
            array (
              'module_id' => '21',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '21/07/2022 09:42',
              'updated_at' => '21/07/2022 09:42',
            ),
            273 => 
            array (
              'module_id' => '21',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '21/07/2022 09:42',
              'updated_at' => '21/07/2022 09:42',
            ),
            274 => 
            array (
              'module_id' => '21',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '21/07/2022 09:42',
              'updated_at' => '21/07/2022 09:42',
            ),
            275 => 
            array (
              'module_id' => '50',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '60',
              'type' => 'normal',
              'created_at' => '19/07/2022 18:41',
              'updated_at' => '21/07/2022 11:31',
            ),
            276 => 
            array (
              'module_id' => '50',
              'year_id' => '3',
              'title' => 'Test#2',
              'ratio' => '30',
              'type' => 'normal',
              'created_at' => '21/07/2022 11:32',
              'updated_at' => '21/07/2022 11:32',
            ),
            277 => 
            array (
              'module_id' => '41',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '21/07/2022 12:03',
              'updated_at' => '21/07/2022 12:03',
            ),
            278 => 
            array (
              'module_id' => '41',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '21/07/2022 12:03',
              'updated_at' => '21/07/2022 12:03',
            ),
            279 => 
            array (
              'module_id' => '41',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '21/07/2022 12:03',
              'updated_at' => '21/07/2022 12:03',
            ),
            280 => 
            array (
              'module_id' => '142',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '21/07/2022 12:22',
              'updated_at' => '21/07/2022 12:22',
            ),
            281 => 
            array (
              'module_id' => '142',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '21/07/2022 12:22',
              'updated_at' => '21/07/2022 12:22',
            ),
            282 => 
            array (
              'module_id' => '142',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '21/07/2022 12:22',
              'updated_at' => '21/07/2022 12:22',
            ),
            283 => 
            array (
              'module_id' => '149',
              'year_id' => '3',
              'title' => 'Test#2',
              'ratio' => '50',
              'type' => 'normal',
              'created_at' => '21/07/2022 17:08',
              'updated_at' => '21/07/2022 17:08',
            ),
            284 => 
            array (
              'module_id' => '22',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '21/07/2022 19:32',
              'updated_at' => '21/07/2022 19:32',
            ),
            285 => 
            array (
              'module_id' => '22',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '21/07/2022 19:32',
              'updated_at' => '21/07/2022 19:32',
            ),
            286 => 
            array (
              'module_id' => '22',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '21/07/2022 19:32',
              'updated_at' => '21/07/2022 19:32',
            ),
            287 => 
            array (
              'module_id' => '54',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '21/07/2022 22:05',
              'updated_at' => '21/07/2022 22:05',
            ),
            288 => 
            array (
              'module_id' => '54',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '21/07/2022 22:05',
              'updated_at' => '21/07/2022 22:05',
            ),
            289 => 
            array (
              'module_id' => '54',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '21/07/2022 22:05',
              'updated_at' => '21/07/2022 22:05',
            ),
            290 => 
            array (
              'module_id' => '25',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '50',
              'type' => 'normal',
              'created_at' => '19/07/2022 09:22',
              'updated_at' => '23/07/2022 08:50',
            ),
            291 => 
            array (
              'module_id' => '25',
              'year_id' => '3',
              'title' => 'Test#2',
              'ratio' => '40',
              'type' => 'normal',
              'created_at' => '23/07/2022 08:50',
              'updated_at' => '23/07/2022 08:50',
            ),
            292 => 
            array (
              'module_id' => '110',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '26/07/2022 09:42',
              'updated_at' => '26/07/2022 09:42',
            ),
            293 => 
            array (
              'module_id' => '110',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '26/07/2022 09:42',
              'updated_at' => '26/07/2022 09:42',
            ),
            294 => 
            array (
              'module_id' => '110',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '26/07/2022 09:42',
              'updated_at' => '26/07/2022 09:42',
            ),
            295 => 
            array (
              'module_id' => '43',
              'year_id' => '3',
              'title' => 'Attendance',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '26/07/2022 10:01',
              'updated_at' => '26/07/2022 10:01',
            ),
            296 => 
            array (
              'module_id' => '43',
              'year_id' => '3',
              'title' => 'Participation',
              'ratio' => '5',
              'type' => 'normal',
              'created_at' => '26/07/2022 10:01',
              'updated_at' => '26/07/2022 10:01',
            ),
            297 => 
            array (
              'module_id' => '43',
              'year_id' => '3',
              'title' => 'Test#1',
              'ratio' => '90',
              'type' => 'normal',
              'created_at' => '26/07/2022 10:01',
              'updated_at' => '26/07/2022 10:01',
            ),
            298 => 
            array (
              'module_id' => '20',
              'year_id' => '3',
              'title' => 'session',
              'ratio' => '100',
              'type' => 'session',
              'created_at' => '26/07/2022 12:49',
              'updated_at' => '26/07/2022 12:49',
            ),
            299 => 
            array (
              'module_id' => '21',
              'year_id' => '3',
              'title' => 'session',
              'ratio' => '100',
              'type' => 'session',
              'created_at' => '26/07/2022 13:21',
              'updated_at' => '26/07/2022 13:21',
            ),
            300 => 
            array (
              'module_id' => '114',
              'year_id' => '3',
              'title' => 'session',
              'ratio' => '100',
              'type' => 'session',
              'created_at' => '01/08/2022 09:11',
              'updated_at' => '01/08/2022 09:11',
            ),
          ));
    }
}
