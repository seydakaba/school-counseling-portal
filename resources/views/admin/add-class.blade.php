<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

        
    </head>
    <body>
        @include('layout.navbar-admin')
        <div style="height:100px"></div>
        <div class="container-table">
            <div class="card mt-3 mb-3">
                <!-- <div style="z-index:999;"class="card-header text-center">
                    <h4>Laravel 9 Import Export Excel & CSV File to Database Example - LaravelTuts.com</h4>
                </div> -->
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="form-control">
                        <br>
                        <button class="btn btn-primary">Öğrencileri İçe Aktar</button>
                    </form>
        
                    <table class="table table-bordered mt-3">
                        <tr>
                            <th colspan="5">
                                Öğrenci Listesi
                                <a class="btn btn-danger float-end" href="">Export User Data</a>
                            </th>
                        </tr>
                        <tr style="text-align:center;">
                            <th style="width:20%;">Okul No</th>
                            <th style="width:20%;">İsim</th>
                            <th style="width:20%;">Soyisim</th>
                            <th>Cinsiyet</th>
                            <th style="width:20%;" >Sınıf</th>
                        </tr>
                        @foreach($students as $std)
                            <tr style="text-align:center;">
                                <td>{{ $std->student_no }}</td>
                                <td>{{ $std->student_name }}</td>
                                <td>{{ $std->student_lastname }}</td>
                                <td>{{ $std->student_gender }}</td>
                                <td>{{ $std->student_class }}</td>
                            </tr>
                        @endforeach
                    </table>
        
                </div>
            </div>
        </div>
    </body>
</html>
