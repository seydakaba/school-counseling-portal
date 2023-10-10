
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
        <div class="container-row">
            <div class="child">
                <div  class="wrapper" style="margin:auto; float:right; width: 550px; height:500px">
                    <form action="" method="POST">
                        @csrf
                        <h1>Öğretmen Ekle</h1>
                        <div class="input-box" style="margin: 40px 0">
                            <input name="isim" type="text" placeholder="İsim" required>
                                <i class='bx bxs-user'></i>
                        </div>
                        <div class="input-box" style="margin: 40px 0">
                            <input name="soyisim" type="text" placeholder="Soyisim" required>
                                <i class='bx bxs-user'></i>
                        </div>
                        <div class="input-box"style="margin: 40px 0">
                            <input name="mail" type="text" placeholder="E-Posta" required>
                            <i class='bx bx-envelope'></i>
                        </div>

                            <a href="/kayit/profil">
                            <button type="submit" class="btn">Ekle</button>
                            </a>
                        
                    </form>
                </div>
            </div>
            <div class="child">
            <div class="wrapper"style="margin:auto; float:left;width: 550px; height:500px">

                
                @php
                    use App\Http\Controllers\ListController;
                    echo "<h1>Sisteme Kayıtlı Öğretmenler</h1>";
                @endphp
                <div class="teacher-container">
                <tr>
                    <th></th>
                    <th></th>
                </tr>                
                @foreach ($teachers as $teacher)
                <tr>
                    <div class="teacher-list">
                        <div class="teacher-name">
                            <td> <a class="list-name" href="/admin/ogretmen-profil/{{ $teacher->id }}">{{ $teacher->teacher_name }} {{ $teacher->teacher_lastname }}</a></td>
                        </div>
                        <div class="teacher-buttons">
                        <td>
                                <a  href="/admin/ogretmen-profil/{{ $teacher->id }}/duzenle">
                                    <button class="list-btn">Düzenle</button>
                                </a>
                                <a  href="/admin/ogretmen-profil/{{ $teacher->id }}/sil">
                                    <button class="list-btn">Sil</button>
                                </a>
                            </div>
                        </td>                        
                    </div>
                </tr>
                @endforeach
                </div>
            </div>                
            </div>


        </div>
    </body>
</html>
