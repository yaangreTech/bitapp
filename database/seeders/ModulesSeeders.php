<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModulesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('modules')->insert(array (
            0 => 
            array (
              'tu_id' => '1',
              'name' => 'Expression Technics',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 11:41',
              'updated_at' => '12/07/2022 11:41',
            ),
            1 => 
            array (
              'tu_id' => '1',
              'name' => 'Basic English',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 11:41',
              'updated_at' => '12/07/2022 11:41',
            ),
            2 => 
            array (
              'tu_id' => '1',
              'name' => 'Technical English',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 11:41',
              'updated_at' => '12/07/2022 11:41',
            ),
            3 => 
            array (
              'tu_id' => '2',
              'name' => 'Statistic & Probabilities',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 11:52',
              'updated_at' => '12/07/2022 11:52',
            ),
            4 => 
            array (
              'tu_id' => '2',
              'name' => 'General Algebra',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 11:52',
              'updated_at' => '12/07/2022 11:52',
            ),
            5 => 
            array (
              'tu_id' => '2',
              'name' => 'Analysis 1',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 11:52',
              'updated_at' => '12/07/2022 11:52',
            ),
            6 => 
            array (
              'tu_id' => '3',
              'name' => 'General Electricity',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 11:53',
              'updated_at' => '12/07/2022 11:53',
            ),
            7 => 
            array (
              'tu_id' => '4',
              'name' => 'Analogic & Digital Electronic',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 11:54',
              'updated_at' => '12/07/2022 11:54',
            ),
            8 => 
            array (
              'tu_id' => '5',
              'name' => 'Networks & Infrastructures',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 11:56',
              'updated_at' => '12/07/2022 11:56',
            ),
            9 => 
            array (
              'tu_id' => '5',
              'name' => 'Computers Architecture',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 11:56',
              'updated_at' => '12/07/2022 11:56',
            ),
            10 => 
            array (
              'tu_id' => '6',
              'name' => 'Operating Systems and Office tools',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 11:58',
              'updated_at' => '12/07/2022 11:58',
            ),
            11 => 
            array (
              'tu_id' => '7',
              'name' => 'Introduction to C Programming',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 11:59',
              'updated_at' => '12/07/2022 11:59',
            ),
            12 => 
            array (
              'tu_id' => '7',
              'name' => 'Algorithms',
              'credict' => '4',
              'heure' => '80',
              'created_at' => '12/07/2022 11:59',
              'updated_at' => '12/07/2022 11:59',
            ),
            13 => 
            array (
              'tu_id' => '8',
              'name' => 'Financial Management',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 12:01',
              'updated_at' => '12/07/2022 12:01',
            ),
            14 => 
            array (
              'tu_id' => '8',
              'name' => 'General Accounting',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 12:01',
              'updated_at' => '12/07/2022 12:01',
            ),
            15 => 
            array (
              'tu_id' => '9',
              'name' => 'Scientific Computing with Python',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:04',
              'updated_at' => '12/07/2022 12:04',
            ),
            16 => 
            array (
              'tu_id' => '9',
              'name' => 'Linear Algebra',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:04',
              'updated_at' => '12/07/2022 12:04',
            ),
            17 => 
            array (
              'tu_id' => '9',
              'name' => 'Analysis 2',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:04',
              'updated_at' => '12/07/2022 12:04',
            ),
            18 => 
            array (
              'tu_id' => '10',
              'name' => 'Management System Overview (MS Project)',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:05',
              'updated_at' => '12/07/2022 12:05',
            ),
            19 => 
            array (
              'tu_id' => '10',
              'name' => 'Advanced Excel and VBA',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:05',
              'updated_at' => '12/07/2022 12:05',
            ),
            20 => 
            array (
              'tu_id' => '10',
              'name' => 'Project Excel and VBA',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:05',
              'updated_at' => '12/07/2022 12:05',
            ),
            21 => 
            array (
              'tu_id' => '11',
              'name' => 'Website Designing Project',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:07',
              'updated_at' => '12/07/2022 12:07',
            ),
            22 => 
            array (
              'tu_id' => '11',
              'name' => 'Introduction to Web Programming',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:07',
              'updated_at' => '12/07/2022 12:07',
            ),
            23 => 
            array (
              'tu_id' => '11',
              'name' => 'Introduction to Javascript',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:07',
              'updated_at' => '12/07/2022 12:07',
            ),
            24 => 
            array (
              'tu_id' => '12',
              'name' => 'Dynamic Algorithmics',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 12:08',
              'updated_at' => '12/07/2022 12:08',
            ),
            25 => 
            array (
              'tu_id' => '13',
              'name' => 'Operating System Design and Programming',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 12:09',
              'updated_at' => '12/07/2022 12:09',
            ),
            26 => 
            array (
              'tu_id' => '14',
              'name' => 'Management strategy',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 12:13',
              'updated_at' => '12/07/2022 12:13',
            ),
            27 => 
            array (
              'tu_id' => '14',
              'name' => 'Entrepreneurial opportunities and business creation in BF',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 12:13',
              'updated_at' => '12/07/2022 12:13',
            ),
            28 => 
            array (
              'tu_id' => '15',
              'name' => 'IT and Energy Rights',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:15',
              'updated_at' => '12/07/2022 12:15',
            ),
            29 => 
            array (
              'tu_id' => '15',
              'name' => 'Business and contract law',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:15',
              'updated_at' => '12/07/2022 12:15',
            ),
            30 => 
            array (
              'tu_id' => '16',
              'name' => 'Python Programming',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:16',
              'updated_at' => '12/07/2022 12:16',
            ),
            31 => 
            array (
              'tu_id' => '16',
              'name' => 'POO (Java)',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:16',
              'updated_at' => '12/07/2022 12:16',
            ),
            32 => 
            array (
              'tu_id' => '16',
              'name' => 'Language theory and compilation',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:16',
              'updated_at' => '12/07/2022 12:16',
            ),
            33 => 
            array (
              'tu_id' => '17',
              'name' => 'Human Machine Interface',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:18',
              'updated_at' => '12/07/2022 12:18',
            ),
            34 => 
            array (
              'tu_id' => '17',
              'name' => 'Advanced Web Technologies, framework and project',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 12:18',
              'updated_at' => '12/07/2022 12:18',
            ),
            35 => 
            array (
              'tu_id' => '18',
              'name' => 'Database Project',
              'credict' => '1',
              'heure' => '20',
              'created_at' => '12/07/2022 12:19',
              'updated_at' => '12/07/2022 12:19',
            ),
            36 => 
            array (
              'tu_id' => '18',
              'name' => 'Relational model and Databases',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:19',
              'updated_at' => '12/07/2022 12:19',
            ),
            37 => 
            array (
              'tu_id' => '18',
              'name' => 'Advanced Databases',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:19',
              'updated_at' => '12/07/2022 12:19',
            ),
            38 => 
            array (
              'tu_id' => '19',
              'name' => 'Object Oriented method of analysis and design',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:21',
              'updated_at' => '12/07/2022 12:21',
            ),
            39 => 
            array (
              'tu_id' => '19',
              'name' => 'Design of information systems with Merise',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:21',
              'updated_at' => '12/07/2022 12:21',
            ),
            40 => 
            array (
              'tu_id' => '20',
              'name' => 'Business and Marketing: Application (Market research, panels)',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:24',
              'updated_at' => '12/07/2022 12:24',
            ),
            41 => 
            array (
              'tu_id' => '20',
              'name' => 'Marketing',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:24',
              'updated_at' => '12/07/2022 12:24',
            ),
            42 => 
            array (
              'tu_id' => '20',
              'name' => 'Business Management',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:24',
              'updated_at' => '12/07/2022 12:24',
            ),
            43 => 
            array (
              'tu_id' => '21',
              'name' => 'Logic and Logical Programming',
              'credict' => '1',
              'heure' => '20',
              'created_at' => '12/07/2022 12:25',
              'updated_at' => '12/07/2022 12:25',
            ),
            44 => 
            array (
              'tu_id' => '21',
              'name' => 'Operation research',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:25',
              'updated_at' => '12/07/2022 12:25',
            ),
            45 => 
            array (
              'tu_id' => '22',
              'name' => 'Architecture Model',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:26',
              'updated_at' => '12/07/2022 12:26',
            ),
            46 => 
            array (
              'tu_id' => '22',
              'name' => 'Comparative analysis methods',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:26',
              'updated_at' => '12/07/2022 12:26',
            ),
            47 => 
            array (
              'tu_id' => '22',
              'name' => 'Computer Project Management',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:26',
              'updated_at' => '12/07/2022 12:26',
            ),
            48 => 
            array (
              'tu_id' => '23',
              'name' => 'Mobile Networks',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:29',
              'updated_at' => '12/07/2022 12:29',
            ),
            49 => 
            array (
              'tu_id' => '23',
              'name' => 'Basics of networks and telecommunications',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:29',
              'updated_at' => '12/07/2022 12:29',
            ),
            50 => 
            array (
              'tu_id' => '23',
              'name' => 'System, Network and Security Administration',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:29',
              'updated_at' => '12/07/2022 12:29',
            ),
            51 => 
            array (
              'tu_id' => '24',
              'name' => 'Mobile Development Project',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 12:33',
              'updated_at' => '12/07/2022 12:33',
            ),
            52 => 
            array (
              'tu_id' => '24',
              'name' => 'Operating system and Mobile Development Framework',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 12:33',
              'updated_at' => '12/07/2022 12:33',
            ),
            53 => 
            array (
              'tu_id' => '25',
              'name' => 'Tutored project',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 12:33',
              'updated_at' => '12/07/2022 12:33',
            ),
            54 => 
            array (
              'tu_id' => '26',
              'name' => 'Technical English',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:47',
              'updated_at' => '12/07/2022 12:47',
            ),
            55 => 
            array (
              'tu_id' => '26',
              'name' => 'Technical Expression',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:47',
              'updated_at' => '12/07/2022 12:47',
            ),
            56 => 
            array (
              'tu_id' => '26',
              'name' => 'Basic English',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 12:56',
              'updated_at' => '12/07/2022 12:56',
            ),
            57 => 
            array (
              'tu_id' => '27',
              'name' => 'Statistics & Probabilities',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 13:01',
              'updated_at' => '12/07/2022 13:01',
            ),
            58 => 
            array (
              'tu_id' => '27',
              'name' => 'General Algebra',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 13:01',
              'updated_at' => '12/07/2022 13:01',
            ),
            59 => 
            array (
              'tu_id' => '27',
              'name' => 'Analysis 1',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 13:01',
              'updated_at' => '12/07/2022 13:01',
            ),
            60 => 
            array (
              'tu_id' => '28',
              'name' => 'Thermodynamics',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 13:04',
              'updated_at' => '12/07/2022 13:04',
            ),
            61 => 
            array (
              'tu_id' => '28',
              'name' => 'General Electricity',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 13:04',
              'updated_at' => '12/07/2022 13:04',
            ),
            62 => 
            array (
              'tu_id' => '29',
              'name' => 'Operating systems and Office tools',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 13:35',
              'updated_at' => '12/07/2022 13:35',
            ),
            63 => 
            array (
              'tu_id' => '30',
              'name' => 'General Chemistry',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 13:35',
              'updated_at' => '12/07/2022 13:35',
            ),
            64 => 
            array (
              'tu_id' => '31',
              'name' => 'Kinetics of mechanism',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 13:38',
              'updated_at' => '12/07/2022 13:38',
            ),
            65 => 
            array (
              'tu_id' => '31',
              'name' => 'Material point mechanics',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 13:38',
              'updated_at' => '12/07/2022 13:38',
            ),
            66 => 
            array (
              'tu_id' => '32',
              'name' => 'Mechanical manufacturing',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 13:39',
              'updated_at' => '12/07/2022 13:39',
            ),
            67 => 
            array (
              'tu_id' => '33',
              'name' => 'Financial management',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 13:42',
              'updated_at' => '12/07/2022 13:42',
            ),
            68 => 
            array (
              'tu_id' => '33',
              'name' => 'General Accounting',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 13:42',
              'updated_at' => '12/07/2022 13:42',
            ),
            69 => 
            array (
              'tu_id' => '34',
              'name' => 'Scientific Computing with Python',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 13:43',
              'updated_at' => '12/07/2022 13:43',
            ),
            70 => 
            array (
              'tu_id' => '34',
              'name' => 'Linear Algebra',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 13:43',
              'updated_at' => '12/07/2022 13:43',
            ),
            71 => 
            array (
              'tu_id' => '34',
              'name' => 'Analysis 2',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 13:43',
              'updated_at' => '12/07/2022 13:43',
            ),
            72 => 
            array (
              'tu_id' => '35',
              'name' => 'Algorithm and Python Programming',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 13:45',
              'updated_at' => '12/07/2022 13:45',
            ),
            73 => 
            array (
              'tu_id' => '35',
              'name' => 'Analog and Digital Electronics',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 13:45',
              'updated_at' => '12/07/2022 13:45',
            ),
            74 => 
            array (
              'tu_id' => '36',
              'name' => 'Heat Transfer',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 13:50',
              'updated_at' => '12/07/2022 13:50',
            ),
            75 => 
            array (
              'tu_id' => '36',
              'name' => 'Thermal machines',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 13:50',
              'updated_at' => '12/07/2022 13:50',
            ),
            76 => 
            array (
              'tu_id' => '37',
              'name' => 'Strength of Materials',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 13:51',
              'updated_at' => '12/07/2022 13:51',
            ),
            77 => 
            array (
              'tu_id' => '37',
              'name' => 'Vibration',
              'credict' => '1',
              'heure' => '20',
              'created_at' => '12/07/2022 13:51',
              'updated_at' => '12/07/2022 13:51',
            ),
            78 => 
            array (
              'tu_id' => '38',
              'name' => 'Computer-Aides Design (CAD)',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 13:53',
              'updated_at' => '12/07/2022 13:53',
            ),
            79 => 
            array (
              'tu_id' => '38',
              'name' => 'Base of Technical Drawing',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 13:53',
              'updated_at' => '12/07/2022 13:53',
            ),
            80 => 
            array (
              'tu_id' => '39',
              'name' => 'Data Analytics with Python',
              'credict' => '6',
              'heure' => '120',
              'created_at' => '12/07/2022 13:58',
              'updated_at' => '12/07/2022 13:58',
            ),
            81 => 
            array (
              'tu_id' => '39',
              'name' => 'Business Ethics',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 13:58',
              'updated_at' => '12/07/2022 13:58',
            ),
            82 => 
            array (
              'tu_id' => '39',
              'name' => 'Planning, Building, Pitching',
              'credict' => '12',
              'heure' => '360',
              'created_at' => '12/07/2022 13:58',
              'updated_at' => '12/07/2022 13:58',
            ),
            83 => 
            array (
              'tu_id' => '39',
              'name' => 'Data Science & Python',
              'credict' => '6',
              'heure' => '120',
              'created_at' => '12/07/2022 13:58',
              'updated_at' => '12/07/2022 13:58',
            ),
            84 => 
            array (
              'tu_id' => '39',
              'name' => 'Business Model Evolution',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 13:58',
              'updated_at' => '12/07/2022 13:58',
            ),
            85 => 
            array (
              'tu_id' => '40',
              'name' => 'Final Project - Business Case',
              'credict' => '15',
              'heure' => '450',
              'created_at' => '12/07/2022 14:02',
              'updated_at' => '12/07/2022 14:02',
            ),
            86 => 
            array (
              'tu_id' => '40',
              'name' => 'Python / Machine Learning',
              'credict' => '4',
              'heure' => '80',
              'created_at' => '12/07/2022 14:02',
              'updated_at' => '12/07/2022 14:02',
            ),
            87 => 
            array (
              'tu_id' => '40',
              'name' => 'Apps / Mobile Development',
              'credict' => '4',
              'heure' => '80',
              'created_at' => '12/07/2022 14:02',
              'updated_at' => '12/07/2022 14:02',
            ),
            88 => 
            array (
              'tu_id' => '40',
              'name' => 'R / Marketing Analytics',
              'credict' => '4',
              'heure' => '80',
              'created_at' => '12/07/2022 14:02',
              'updated_at' => '12/07/2022 14:02',
            ),
            89 => 
            array (
              'tu_id' => '40',
              'name' => 'Thesis Writing',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 14:02',
              'updated_at' => '12/07/2022 14:02',
            ),
            90 => 
            array (
              'tu_id' => '41',
              'name' => 'Fianal Project -Business case',
              'credict' => '15',
              'heure' => '450',
              'created_at' => '12/07/2022 14:06',
              'updated_at' => '12/07/2022 14:06',
            ),
            91 => 
            array (
              'tu_id' => '41',
              'name' => 'Market Analysis, Sales',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:06',
              'updated_at' => '12/07/2022 14:06',
            ),
            92 => 
            array (
              'tu_id' => '41',
              'name' => 'Join Business plan, Vision, & Strategy',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 14:06',
              'updated_at' => '12/07/2022 14:06',
            ),
            93 => 
            array (
              'tu_id' => '41',
              'name' => 'Elaboration of a Businees case',
              'credict' => '1',
              'heure' => '20',
              'created_at' => '12/07/2022 14:06',
              'updated_at' => '12/07/2022 14:06',
            ),
            94 => 
            array (
              'tu_id' => '41',
              'name' => 'Financial Planning',
              'credict' => '4',
              'heure' => '80',
              'created_at' => '12/07/2022 14:06',
              'updated_at' => '12/07/2022 14:06',
            ),
            95 => 
            array (
              'tu_id' => '41',
              'name' => 'Realization planning, roadmap, legal',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:06',
              'updated_at' => '12/07/2022 14:06',
            ),
            96 => 
            array (
              'tu_id' => '41',
              'name' => 'Thesis Writing',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 14:06',
              'updated_at' => '12/07/2022 14:06',
            ),
            97 => 
            array (
              'tu_id' => '42',
              'name' => 'Technical Expression',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:10',
              'updated_at' => '12/07/2022 14:10',
            ),
            98 => 
            array (
              'tu_id' => '42',
              'name' => 'Basic English',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:10',
              'updated_at' => '12/07/2022 14:10',
            ),
            99 => 
            array (
              'tu_id' => '42',
              'name' => 'Technical English',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:10',
              'updated_at' => '12/07/2022 14:10',
            ),
            100 => 
            array (
              'tu_id' => '43',
              'name' => 'Statistics & Probabilities',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:12',
              'updated_at' => '12/07/2022 14:12',
            ),
            101 => 
            array (
              'tu_id' => '43',
              'name' => 'General Algebra',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:12',
              'updated_at' => '12/07/2022 14:12',
            ),
            102 => 
            array (
              'tu_id' => '43',
              'name' => 'Analysis 1',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:12',
              'updated_at' => '12/07/2022 14:12',
            ),
            103 => 
            array (
              'tu_id' => '44',
              'name' => 'General Electricity - Optics',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 14:13',
              'updated_at' => '12/07/2022 14:13',
            ),
            104 => 
            array (
              'tu_id' => '44',
              'name' => 'Thermodynamics',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:13',
              'updated_at' => '12/07/2022 14:13',
            ),
            105 => 
            array (
              'tu_id' => '45',
              'name' => 'Operating systems and office tools',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 14:13',
              'updated_at' => '12/07/2022 14:13',
            ),
            106 => 
            array (
              'tu_id' => '46',
              'name' => 'Conversion and Production of electrical energy',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 14:15',
              'updated_at' => '12/07/2022 14:15',
            ),
            107 => 
            array (
              'tu_id' => '47',
              'name' => 'Renewable Energy Application (Wind Energy, Biomass, Hydroelectric Energy)',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 14:16',
              'updated_at' => '12/07/2022 14:16',
            ),
            108 => 
            array (
              'tu_id' => '48',
              'name' => 'Electromagnetism',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:17',
              'updated_at' => '12/07/2022 14:17',
            ),
            109 => 
            array (
              'tu_id' => '48',
              'name' => 'Electric current',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:17',
              'updated_at' => '12/07/2022 14:17',
            ),
            110 => 
            array (
              'tu_id' => '49',
              'name' => 'Financial Management',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 14:20',
              'updated_at' => '12/07/2022 14:20',
            ),
            111 => 
            array (
              'tu_id' => '49',
              'name' => 'General Accounting',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 14:20',
              'updated_at' => '12/07/2022 14:20',
            ),
            112 => 
            array (
              'tu_id' => '50',
              'name' => 'Scientific Computing with Python',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:27',
              'updated_at' => '12/07/2022 14:27',
            ),
            113 => 
            array (
              'tu_id' => '50',
              'name' => 'Linear Algebra',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:27',
              'updated_at' => '12/07/2022 14:27',
            ),
            114 => 
            array (
              'tu_id' => '50',
              'name' => 'Analysis 2',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:27',
              'updated_at' => '12/07/2022 14:27',
            ),
            115 => 
            array (
              'tu_id' => '51',
              'name' => 'Analogic and Digital Electronic',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:28',
              'updated_at' => '12/07/2022 14:28',
            ),
            116 => 
            array (
              'tu_id' => '51',
              'name' => 'Algorithmic and Python Programming',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 14:28',
              'updated_at' => '12/07/2022 14:28',
            ),
            117 => 
            array (
              'tu_id' => '52',
              'name' => 'Thermal Machines',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 14:31',
              'updated_at' => '12/07/2022 14:31',
            ),
            118 => 
            array (
              'tu_id' => '52',
              'name' => 'Heat Transfert',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:31',
              'updated_at' => '12/07/2022 14:31',
            ),
            119 => 
            array (
              'tu_id' => '53',
              'name' => 'Deposit of Renewable energies sources',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:32',
              'updated_at' => '12/07/2022 14:32',
            ),
            120 => 
            array (
              'tu_id' => '54',
              'name' => 'Electric Machines',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:34',
              'updated_at' => '12/07/2022 14:34',
            ),
            121 => 
            array (
              'tu_id' => '54',
              'name' => 'Electrical Transformer',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:34',
              'updated_at' => '12/07/2022 14:34',
            ),
            122 => 
            array (
              'tu_id' => '55',
              'name' => 'Technical Drawing',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:34',
              'updated_at' => '12/07/2022 14:34',
            ),
            123 => 
            array (
              'tu_id' => '56',
              'name' => 'Management Strategy',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 14:38',
              'updated_at' => '12/07/2022 14:38',
            ),
            124 => 
            array (
              'tu_id' => '56',
              'name' => 'Entrepreneurial opportunities and business creation in the BF',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 14:38',
              'updated_at' => '12/07/2022 14:38',
            ),
            125 => 
            array (
              'tu_id' => '57',
              'name' => 'IT aand Energy law',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:39',
              'updated_at' => '12/07/2022 14:39',
            ),
            126 => 
            array (
              'tu_id' => '57',
              'name' => 'Business and Contract Law',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:39',
              'updated_at' => '12/07/2022 14:39',
            ),
            127 => 
            array (
              'tu_id' => '58',
              'name' => 'Computer Networks/ Infrastructures',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:40',
              'updated_at' => '12/07/2022 14:40',
            ),
            128 => 
            array (
              'tu_id' => '58',
              'name' => 'Power Electronics',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:40',
              'updated_at' => '12/07/2022 14:40',
            ),
            129 => 
            array (
              'tu_id' => '58',
              'name' => 'Computer Architecture',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:40',
              'updated_at' => '12/07/2022 14:40',
            ),
            130 => 
            array (
              'tu_id' => '59',
              'name' => 'Physical Thermodynamics',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:42',
              'updated_at' => '12/07/2022 14:42',
            ),
            131 => 
            array (
              'tu_id' => '59',
              'name' => 'Technical drawing',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:42',
              'updated_at' => '12/07/2022 14:42',
            ),
            132 => 
            array (
              'tu_id' => '59',
              'name' => 'Electromagnetism',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:42',
              'updated_at' => '12/07/2022 14:42',
            ),
            133 => 
            array (
              'tu_id' => '60',
              'name' => 'C Programming',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:43',
              'updated_at' => '12/07/2022 14:43',
            ),
            134 => 
            array (
              'tu_id' => '61',
              'name' => 'Design an Sizing of a solar photovoltaic generator',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 14:45',
              'updated_at' => '12/07/2022 14:45',
            ),
            135 => 
            array (
              'tu_id' => '61',
              'name' => 'Solar, Wind, and Hydraulic deposit',
              'credict' => '1',
              'heure' => '20',
              'created_at' => '12/07/2022 14:45',
              'updated_at' => '12/07/2022 14:45',
            ),
            136 => 
            array (
              'tu_id' => '61',
              'name' => 'Photovoltaic cell Technology',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:45',
              'updated_at' => '12/07/2022 14:45',
            ),
            137 => 
            array (
              'tu_id' => '62',
              'name' => 'Business and Marketing: Application (Market, Reasearch, Panels)',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:47',
              'updated_at' => '12/07/2022 14:47',
            ),
            138 => 
            array (
              'tu_id' => '62',
              'name' => 'Marketing',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:47',
              'updated_at' => '12/07/2022 14:47',
            ),
            139 => 
            array (
              'tu_id' => '62',
              'name' => 'Business Management',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:47',
              'updated_at' => '12/07/2022 14:47',
            ),
            140 => 
            array (
              'tu_id' => '63',
              'name' => 'Supervision of electrical Network (Theory & Practice)',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:51',
              'updated_at' => '12/07/2022 14:51',
            ),
            141 => 
            array (
              'tu_id' => '63',
              'name' => 'Metrology and sensors',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:51',
              'updated_at' => '12/07/2022 14:51',
            ),
            142 => 
            array (
              'tu_id' => '63',
              'name' => 'Microcontrollers',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:51',
              'updated_at' => '12/07/2022 14:51',
            ),
            143 => 
            array (
              'tu_id' => '64',
              'name' => 'Theory of circuits',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 14:52',
              'updated_at' => '12/07/2022 14:52',
            ),
            144 => 
            array (
              'tu_id' => '65',
              'name' => 'Technical and economic analysis of a photovoltaic project',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 14:55',
              'updated_at' => '12/07/2022 14:55',
            ),
            145 => 
            array (
              'tu_id' => '65',
              'name' => 'Installation and Safety of Renewable Energies (Practical on Photovoltaic systems)',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 14:55',
              'updated_at' => '12/07/2022 14:55',
            ),
            146 => 
            array (
              'tu_id' => '66',
              'name' => 'Renewable Energy Projects',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 14:56',
              'updated_at' => '12/07/2022 14:56',
            ),
            147 => 
            array (
              'tu_id' => '68',
              'name' => 'Telecommunication Technologies (Basics, antennas, high-frequency technology)',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 15:02',
              'updated_at' => '12/07/2022 15:02',
            ),
            148 => 
            array (
              'tu_id' => '68',
              'name' => 'Energy Management (Applied regulation technology)',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 15:02',
              'updated_at' => '12/07/2022 15:02',
            ),
            149 => 
            array (
              'tu_id' => '69',
              'name' => 'Building a small microgrid',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 15:03',
              'updated_at' => '12/07/2022 15:03',
            ),
            150 => 
            array (
              'tu_id' => '70',
              'name' => 'Microgrids & Smart Grids - Energy Transmission',
              'credict' => '6',
              'heure' => '120',
              'created_at' => '12/07/2022 15:04',
              'updated_at' => '12/07/2022 15:04',
            ),
            151 => 
            array (
              'tu_id' => '71',
              'name' => 'Batteries',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 15:06',
              'updated_at' => '12/07/2022 15:06',
            ),
            152 => 
            array (
              'tu_id' => '71',
              'name' => 'Storage Technology',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 15:06',
              'updated_at' => '12/07/2022 15:06',
            ),
            153 => 
            array (
              'tu_id' => '72',
              'name' => 'Project work solar water pump*',
              'credict' => '6',
              'heure' => '120',
              'created_at' => '12/07/2022 15:07',
              'updated_at' => '12/07/2022 15:07',
            ),
            154 => 
            array (
              'tu_id' => '73',
              'name' => 'Business Ethics and Technology & Innovation Management',
              'credict' => '3',
              'heure' => '60',
              'created_at' => '12/07/2022 15:08',
              'updated_at' => '12/07/2022 15:08',
            ),
            155 => 
            array (
              'tu_id' => '67',
              'name' => 'Object-Oriented Programming',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:57',
              'updated_at' => '25/07/2022 08:39',
            ),
            156 => 
            array (
              'tu_id' => '67',
              'name' => 'Object-Oriented Programming Project',
              'credict' => '2',
              'heure' => '40',
              'created_at' => '12/07/2022 14:57',
              'updated_at' => '25/07/2022 08:43',
            ),
          ));
    }
}
