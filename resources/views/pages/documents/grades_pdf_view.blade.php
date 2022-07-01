<section class="content">
    <table class="table">
        <tr>
            <td colspan="3" class="center">
            <div class="center">
                <!-- <span class="center"> -->
                    Autorisation de création: N°
                    2018-00/01347/MESRSI/SG/DGESup/DIPES du 13 Septembre 2018
                    <!-- </span><span class="center"> --><br/>
                        Autorisation d’ouverture: N°
                    2018-00001511/MESRSI/SG/DGESup/DIPES du 25 Septembre 2018
                    <!-- </span>  -->
                 </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="center align-center">
                <!-- height="40.7"  -->
                    <img src="{$logoPath}" 
                    width="500.02"/>
                </div>
            </td>
            <td>
            </td>
            <td class="center align-center">
                <p class="addr-font-h3"><strong>B</strong>URKINA
                    <strong>F</strong>ASO
                </p>
                <p class="font-bold addr-font-h4">
                    Ministry of Higher Education,<br /> Scientific Research and
                    Innovation
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="center">
                    <h3 class="center "><span class="titre"
                            >Grade
                            Transcript</span>
                    </h3>
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <div class="" style="text-align: left">
                    <span class="sname">Surname</span>:<span>{{$data->student->first_name}}</span><br/>
                    <span class="sname"> Name</span>:<span>{{$data->student->Last_name}}</span><br/>
                    <span class="sname"> ID</span>:<span>{{$data->student->matricule }}</span><br/>
                </div>
            </td>
            <td></td>
            <td class="center align-center">
             <div>
                <span class="sref">Accademic Year</span>:<span>{{$data->level->label }}</span><br/>
                <span class="sref">Graduation Year</span>:<span>{{$data->year->name}}</span><br/>
                <span class="sref">Subject</span>:<span>{{$data->level->branche->departement->label}}</span><br/>
             </div>
            </td>
        </tr> 
    </table>
    
    <table class=" vrai">
        <!-- <thead> -->
            <tr nobr="true">
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
        <tbody >
             {{-- {$bodyElememts} --}}
        </tbody>
    </table>

        <table>
            <tr>
                <td></td>
               
                <td>
                <div class="center" colspan="2">
                        Koudougou, {{$today}}
                    </div>
                    <div  class="center" style="width:300px;">
                            <span class="font-bold font-underline" style="color:black;">
                                Accademic
                                Director</span><br />
                        </div>
                </td>
            </tr>

            <tr>
                <td></td>
            
                <td></td>
            </tr>
            
            <tr>
                <td></td>
             
                <td colspan="2">
                <div class="center" style="width:300px;margin-top: 100px">
                            <span class="" style="color:black;text-decoration: underline"> Dr.
                                Bawindsom Marcel KEBRE</span><br/>
                            <span>Maître de Conférences (Lecturer)</span>
                        </div>
                </td>
            </tr>
        </table>  
    </section>
    
