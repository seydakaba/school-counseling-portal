
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
        @include('layout.navbar-teacher')
        <div class="container-row">
            <div class="child">
                <div id=signup-wrapper class="wrapper" style="margin:auto; float:right; width: 550px; height:500px">
                    <form id="ekle" action="" method="POST">
                        @csrf
                        <h1>Randevu Oluştur</h1>
                        <input type="text" name="student_no" placeholder="Öğrenci Numarası" required>
                        <input type="datetime-local" name="start" placeholder="Başlangıç Tarihi" required>
                        <button form="ekle"type="submit">Randevu Oluştur</button>
                    </form>
                </div>
            </div>
            <div class="child">
            <div class="wrapper"style="margin:auto; float:left;width: 550px; height:500px;">
            <div>
                <h1>Randevular</h1>
                <form id="filterform"action="" method="GET">
                    @csrf
                    <div style="display:flex;">
                    <select style="margin-right:5px"name="action" id="action">
                        <option selected value="all">Tümü</option>
                        <option value="today">Bugün</option>
                        <option value="week">Bu Hafta</option>
                        <option value="month">Bu Ay</option>
                        <option value="year">Bu Yıl</option>
                        <option value="past">Geçmiş</option>
                        <option value="future">Gelecek</option>
                    </select>
                    <button style="background-color:white; border:none; width:50px; border-radius:4px" form="filterform"type="submit" ><i style="font-size:20px"class='bx bx-search'></i></button>
                    </div>

                    
                    

                    @foreach($appointments as $appointment)
                    <div style="margin-top:10px; display:flex;"class="appointment">
                        <div class="appointment-info">
                            <p><b> Öğrenci:</b> {{$appointment->student->student_no}} {{$appointment->student->student_name}} {{$appointment->student->student_lastname}}</p>
                            <p><b>Görüşme Tarihi: </b> {{$appointment->start}}</p>
                        </div>
                        <div style="margin-left:150px"class="ap-link">
                            <a href="/ogretmen/gorusme/{{$appointment->id}}"><i style="font-size: 30px; color:white"class='bx bxs-user-detail'></i></a>
                        </div>
                    </div>
                    <hr>
                    @endforeach

                </form>


            </div>
            

            </div>                
            </div>


        </div>
    </body>
</html>