<!DOCTYPE html>
<html>

<head>
    <!-- <meta charset="utf-8"> -->
    <title>bit|grade-preview</title>
    <style>
        body {
            font-family: Arial;
            font-size: 11px;
        }

        p {
            text-indent: -5px;
        }

        ul {
            text-indent: 25px
        }

        b {
            /* font-family: arial-bold; */
        }

        .letter_spacement {
            letter-spacing: -0.2px;
        }

        .line_spacement {
            line-height: 13px;
        }

        .center {
            justify-content: center;
            align-items: center;
            text-align: center;
            /* float: center; */
        }

        .right {
            text-align: right;
            /* align-content: center */
            /* float: right; */
        }

        .titre {
            width: 300px;
            line-height: 13px;
            font-weight: bold;
            text-decoration: underline;
        }

        .sname {
            width: 500px;
        }

        .vrai {
            border-collapse: collapse;
            width: 100%;
            margin-top:20px;
            /* word-wrap:break-word!important;*/
            table-layout:fixed;
            margin-left: auto;
            margin-right: auto;
            /* overflow: wrap; */
        }

        .vrai,
        .vrai th,
        .vrai td {
            border: 1px solid !important;
            word-wrap: break-word!important;
            
        }

        .vrai tr {
            font-size: 8px !important;
        }

        .vrai th {
            /* white-space: nowrap ! important; */
            align-items: center;
        }

        .theade {
            /* font-size: 8px; */
            vertical-align: sub;
            font-weight: bold;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            /* white-space: pre ! important; */
        }

        .semester {
           background-color:#d8d8d8;
           text-rotate:90;
           padding-left: 5px;
           padding-right: 5px;
        }

        /* .rotater {
            -ms-writing-mode: tb-rl;
            -webkit-writing-mode: vertical-rl;
            writing-mode: vertical-rl;
            transform: rotate(-90deg);
            /* white-space: nowrap; */
        /* }  */

        .mini{
            word-wrap: break-word!important;
            /* padding:2px; */
        }

        .cost1{
            width: 20%;
        }
        .cost2{
            width: 30%;
            font-weight: normal;
        }


    </style>
</head>

<body>
    <div>
        <section class="">
            <table class="table">
                <tr class="center">
                    <td colspan="3" class="center">
                        <div class="center" style="font-family: Calibri; font-size:10px">
                            <!-- <span class="center"> -->
                            Autorisation de création: N°
                            2018-00/01347/MESRSI/SG/DGESup/DIPES du 13 Septembre 2018
                            <!-- </span><span class="center"> --><br />
                            Autorisation d’ouverture: N°
                            2018-00001511/MESRSI/SG/DGESup/DIPES du 25 Septembre 2018
                            <!-- </span>  -->
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="width:64%">
                        <div class="center align-center">
                            <img src="assets/images/head_icon.png" alt="logo" width="200.02" />
                        </div>
                    </td>

                    <td class="right" style="align-items: right; font-weight: bold">
                        <div class="" style="">
                            <p class="addr-font-h3"><strong style="font-size:18px">B</strong>URKINA
                                <strong style="font-size:18px">F</strong>ASO
                            </p>
                            <p class="font-bold">
                                Ministry of Higher Education,<br /> Scientific Research and
                                Innovation
                            </p>
                        </div>
                    </td>
                </tr>

            </table>

            <div class="center">
                <div class="center" style="border-bottom: 3px solid gray;">
                    <h3 class="center " style="font-family: 'Arial MT'; font-size:25px; margin-bottom: 8px"><span>Grade
                            Transcript</span>
                    </h3>
                </div>
            </div>

            <table class="table" style="width: 100%; font-size: 14px; margin-top:10px">
                <tr style="">
                    <td style="width:10%">
                        <div class="" style="text-align: left">
                            <span class="sname">Surname</span>
                        </div>
                    </td>
                    <td style="width:30% ; background-color:#f2f2f2; border-bottom: 1px solid black">
                        <span>{{ $data->student->first_name }}</span><br />
                    </td>
                    <td style=""></td>
                    <td class="" style="width: 20%">
                        <div>
                            <span class="sref">Accademic Year</span>
                        </div>
                    </td>
                    <td style=" background-color:#f2f2f2; width:30%; border-bottom: 1px solid black">
                        <span>{{ $data->level->label }}</span>
                    </td>
                </tr>
                <tr style="">
                    <td style="width:10%">
                        <div class="" style="text-align: left">
                            <span class="sname"> Name</span>
                        </div>
                    </td>
                    <td style="width:30% ; background-color:#f2f2f2; border-bottom: 1px solid black">
                        <span>{{ $data->student->Last_name }}</span>
                    </td>
                    <td style=""></td>
                    <td class="" style="width: 20%">
                        <div>
                            <span class="sref">Graduation Year</span>
                        </div>
                    </td>
                    <td style=" background-color:#f2f2f2; width:30%; border-bottom: 1px solid black">
                        <span>{{ $data->year->name }}</span>
                    </td>
                </tr>
                <tr style="">
                    <td style="width:10%">
                        <div class="" style="text-align: left">
                            <span class="sname"> ID</span>
                        </div>
                    </td>
                    <td style="width:30% ; background-color:#d8d8d8; border-bottom: 1px solid black">
                        <span>{{ $data->student->matricule }}</span>
                    </td>
                    <td style=""></td>
                    <td class="" style="width: 20%">
                        <div>
                            <span
                                class="sref">Subject</span>
                        </div>
                    </td>
                    <td style=" background-color:#f2f2f2; width:30%; border-bottom: 1px solid black">
                        <span>{{ $data->level->branche->departement->label }}</span>
                    </td>
                </tr>
            </table>

            <table class="vrai">
                <!-- <thead> -->
                <tr  style="background-color:#d8d8d8">
                    <th style="" class="theade semester"></th>
                    <th style="" class="theade">TU</th>
                    <th style="" class="theade">TUE</th>
                    <th style="" class="theade">TUE Credits</th>
                    <th style="" class="theade">Grade/20</th>
                    <th style="" class="theade">TU Average</th>
                    <th style="" class="theade">Acquired Credits</th>
                    <th style="" class="theade">TU Validation</th>
                    <th style="" class="theade">Rating</th>
                </tr>
                <!-- </thead> -->
                <tbody>
                    <?php $new_semester = 1; ?>
                    @foreach ($data->level->semesters as $semester)
                        <?php $new_semester = 1; ?>
                        @foreach ($semester->tus as $tu)
                            @foreach ($tu->modulus as $modul_index => $modul)
                                @if ($modul_index == 0)
                                    @if ($new_semester == 1)
                                        <?php $new_semester = -1; ?>
                                        <?php $semestre_rowspan = $semester->s_n_modulus + 1; ?>


                                        <tr>
                                            <td class="center mini semester " rowspan="{{ $semestre_rowspan }}"> 
                                                <span class="rotater">{{ $semester->label }}</span>
                                             </td>
                                            <td class=" mini cost1" rowspan="{{ $tu->t_n_modulus }}"> {{ $tu->name }}
                                            </td>
                                            <td class=" mini cost2">{{ $modul->name }}</td>
                                            <td class="center mini">{{ $modul->credict }}</td>
                                            <td class="center mini">{{ $modul->note }}</td>
                                            <td class="center mini" rowspan="{{ $tu->t_n_modulus }}">
                                                {{ $tu->tu_average }}</td>
                                            <td class="center mini" rowspan="{{ $tu->t_n_modulus }}">
                                                {{ $tu->tu_v_credit }}</td>
                                            <td class="center mini" rowspan="{{ $tu->t_n_modulus }}">
                                                {{ $tu->tu_validation }}</td>
                                            <td class="center mini" rowspan="{{ $tu->t_n_modulus }}">
                                                {{ $tu->conforme->international_Grade }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td class=" mini cost1" rowspan="{{ $tu->t_n_modulus }}">{{ $tu->name }}
                                            </td>
                                            <td class=" mini cost2">{{ $modul->name }}</td>
                                            <td class="center mini">{{ $modul->credict }}</td>
                                            <td class="center mini">{{ $modul->note }}</td>
                                            <td class="center mini" rowspan="{{ $tu->t_n_modulus }}">
                                                {{ $tu->tu_average }}</td>
                                            <td class="center mini" rowspan="{{ $tu->t_n_modulus }}">
                                                {{ $tu->tu_v_credit }}</td>
                                            <td class="center mini" rowspan="{{ $tu->t_n_modulus }}">
                                                {{ $tu->tu_validation }}</td>
                                            <td class="center mini" rowspan="{{ $tu->t_n_modulus }}">
                                                {{ $tu->conforme->international_Grade }}</td>
                                        </tr>
                                    @endif
                                @else
                                    <tr>
                                        <td class=" mini cost2" ><span>{{ $modul->name }}</span></td>
                                        <td class="center mini">{{ $modul->credict }}</td>
                                        <td class="center mini">{{ $modul->note }}</td>
                                    </tr>
                                @endif
                            @endforeach;
                        @endforeach;
                        @if ($new_semester == -1)
                            <tr class="btn-default" style="background-color: #d8d8d8">
                                <td colspan="2" class="center" style="font-weight: bold">Summary {{ $semester->name }}</td>
                                <td class="center" style="font-weight: bold">{{ $semester->s_credit }}</td>
                                <td class="center bg-white"></td>
                                <td class="center" style="font-weight: bold">{{ $semester->s_n_average }}</td>
                                <td class="center" style="font-weight: bold">{{ $semester->s_v_credit }}</td>
                                <td class="center" style="font-weight: bold;color:blue">{{ $semester->s_validation }}</td>
                                <td class="center" style="font-weight: bold;color:blue">{{ $semester->conforme->international_Grade }}</td>
                            </tr>
                        @endif
                    @endforeach;
                </tbody>
            </table>

            <table style="width:100%; margin-top: 8px">
                <tr>
                    <td style="width:73.5%">
                    
<span style="font-style: italic">NB:  </span> 
<span style="font-size:8px; font-style: italic">- A semester is validated if and only if the semester average ≥ 10 and the average of each TU ≥ 08;</span><br/> 
    <span style="font-size:8px; font-style: italic">- Any nature or overload causes the invalidity of this document;</span> <br/>
        <span style="font-size:8px; font-style: italic">- Only one transcript is issued. It is up to the interested party to make certified copies.</span> 
                    </td>

                    <td  class="center" style="width:26.5%">
                        <div >
                            <div class="">
                                Koudougou, {{ $today }}
                            </div>
    
                            <div class="" style="width:300px;">
                                <span class="font-bold font-underline" style="color:black;">
                                    Accademic
                                    Director</span><br />
                            </div>
                        </div>
                    </td>
                </tr>
            </table>

            <table style="width:100%; margin-top: 70px">
                <tr >
                    <td style="width:73.5%"></td>

                    <td class="center" style="width:26.5%;">
                        <div class="center" style="width:300px;">
                            <span class="" style="color:black;text-decoration: underline"> Dr.
                                Bawindsom Marcel KEBRE</span><br />
                            <span>Maître de Conférences (Lecturer)</span>
                        </div>
                    </td>
                </tr>
            </table>
        </section>
    </div>
</body>


</html>
