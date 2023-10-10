<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @include('layout.navbar-admin')
    <div style="height:100px"></div>
    <div style="width:95%; margin:auto; border-radius:40px;" class="container">
        <div style="display:flex; justify-content:space-between" class="row">
            <div style="" class="col-12">
                <h1>{{$students->student_name}} {{$students->student_lastname}}</h1>
            </div>
            <div style="" class="status-box">
                @if ($students->student_status == 1)
                    <div style="margin:0; " class="status1">
                        <i class='bx bxs-meh-blank'></i>
                    </div>
                @elseif ($students->student_status == 2)
                    <div style="" class="status2">
                        <i class='bx bxs-meh-blank'></i>
                    </div>
                @else
                    <div style="" class="status3">
                        <i class='bx bxs-meh-blank'></i>
                    </div>
                @endif  
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <table class="table-bordered">
                    <tr>
                        <th>Okul Numarası</th>
                        <td>{{$students->student_no}}</td>
                    </tr>
                    <tr>
                        <th>Sınıfı</th>
                        <td>{{$students->student_class}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div style="height:10px"></div>
    <div style="width:95%; margin:auto; border-radius:40px; display:flex" class="">
        <div class="wrapper" style="margin:auto;width: 550px; height:500px;">
                <div>
                    <h1>Randevular</h1>
                    @foreach ($appointments as $appointment)
                        <a style="text-decoration:none; font-size:20px; color:white"href="route('teacher.appointment-page', $appointment->id)">{{$appointment->start}}
                        </a> <br>
                        <hr>
                    @endforeach
                </div>
        </div>   
        <div class="wrapper" style="margin-left:10px; width: 100%; height:500px;">
                <div>
                    <h1>Notlar</h1>
                    @foreach ($appointments as $appointment)
                        @foreach ($appointment->notes as $note)
                            <p style="margin-top:10px; margin-bottom:10px">{{$note->note}}</p>
                            <hr>
                        @endforeach
                    @endforeach
                </div>
        </div> 
    </div>

</body>
</html>