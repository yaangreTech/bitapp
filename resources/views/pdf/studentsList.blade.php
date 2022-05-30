<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
    {{-- <link href="assets/css/app.min.css" rel="stylesheet"> --}}
    {{-- <link href="assets/css/style.css" rel="stylesheet" /> --}}
    {{-- <link href="assets/css/styles/all-themes.css" rel="stylesheet" /> --}}
</head>
<body>
    <h1>{{ '$title' }}</h1>
    <p>{{ '$date' }}</p>
 
    <div class="body">
        <div class="table-responsive">
            <table id="students_table"
                class="display student_ table table-bordered  table-hover  order-column m-t-20 width-per-100   dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Birthdate</th>
                        <th>Phone</th>
                        {{-- <th>Status</th> --}}
                    </tr>
                </thead>
                <tbody id="student_body">
                    @foreach($inscriptions as $index => $inscription)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$inscription['student']['matricule']}}</td>
                        <td>{{$inscription['student']['first_name']}}</td>
                        <td>{{$inscription['student']['Last_name']}}</td>
                        <td>{{$inscription['student']['gender']}}</td>
                        <td>{{$inscription['student']['email']}}</td>
                        <td>{{$inscription['student']['birth_date']}}</td>
                        <td>{{$inscription['student']['phone']}}</td>
                        
                    </tr>
                    @endforeach
                </tbody>


            </table>
        </div>
    </div>
</body>
{{-- <script src="assets/js/table.min.js"></script> --}}
{{-- <script src="assets/js/app.min.js"></script> --}}

    <!-- Custom Js -->
    {{-- <script src="assets/js/admin.js"></script> --}}
</html>