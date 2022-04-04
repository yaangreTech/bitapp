<x-app-layout filtrage='false'>
    <x-slot name="custom_css">
    </x-slot>

    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <form method='post' action="downloadStudentList_themplate">
                                @csrf
                                <div class="col-lg-12 col-md-12 font-20">
                                    In order do import students list from a csv file. there is a themplate that shoold
                                    be respect
                                    in order to succes the importation of data. click on the <button
                                        class="btn btn-primary waves-effect" type="submit">download</button> to get the
                                    csv themplate.
                                </div>
                            </form>
                            <form id='import_form' method='post'>
                            <div class="row">
                                
                                    @csrf
                                    <div class="col-md-6">
                                        <label>Level</label>
                                        <select required id="studentClasse" name="studentClasse"
                                            class="browser-default">
                                            <option value="" disabled selected>Choose the Level</option>
                                            @forelse ($departments as $department)
                                                <optgroup label="{{ $department->name }}">
                                                    @forelse ($department->branches as $branch)
                                                        @foreach ($branch->levels as $level)
                                                            <option value="{{ $level->id }}">
                                                                {{ $branch->name . ', ' . $level->name }}
                                                            </option>
                                                        @endforeach
                                                    @empty
                                                        <option value="" disabled>Choose Options for
                                                            {{ $department->name }}
                                                        </option>
                                                    @endforelse
                                                </optgroup>
                                            @empty
                                                <optgroup label="No department"></optgroup>
                                            @endforelse
                                        </select>
                                        <span class="text-danger studentClasse"></span>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Promotion</label>
                                        <select required id="studentPromotion" name="studentPromotion"
                                            class="browser-default">
                                            <option value="" disabled selected>Choose the Promotion</option>
                                            @forelse ($promotions as $promotion)
                                                <option value="{{ $promotion->id }}">{{ $promotion->name }}
                                                </option>
                                            @empty
                                                <option disabled>No promotion</option>
                                            @endforelse


                                        </select>
                                        <span class="text-danger studentPromotion"></span>
                                    </div>

                                    <div class="col-md-12">
                                        {{-- <form action="#"> --}}
                                        <div class="file-field input-field">
                                            <div class="btn">
                                                <span>File</span>
                                                <input name="ficher1" accept=".csv" type="file">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input name="ficher2" class="file-path validate" type="text">
                                            </div>
                                        </div>
                                        {{-- </form> --}}
                                    </div>

                               
                            </div>
                        </form>


                            <div class="pull-right">
                                <button onclick="import_students('import_form')"
                                    class="btn btn-primary waves-effect">Execute</button>


                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="importLogs">

                </div>
            </div>
        </div>
    </section>

    <x-slot name="custom_js">
        <script src="assets/ajax/student_ajax.js"></script>
    </x-slot>


</x-app-layout>
