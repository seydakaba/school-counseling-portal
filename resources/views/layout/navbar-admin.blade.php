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
    <nav>
             <div class="header">
                <div class="logo">
                    <h1>LOGO</h1>
                </div>
                <div class="navbar-menu">
                    <div class="navbar-elements">
                        <ul>
                            <li><a href="/">Anasayfa</a></li>
                            <li><a href="/ajanda">Ajanda</a></li>
                            <li><a href="/siniflar">Sınıflar</a></li>
                            <li><a href=#>Yeni Kayıt
                            <i style="font-size: 15px;"class='bx bx-chevrons-down' ></i>
                            </a>
                                <ul class="dropdown">
                                    <li style="margin-top: 20px;"><a href="/gorusmeler">Öğretmen Ekle</a></li>
                                    <li style="margin-top: 10px;"><a href="/arsiv">Öğrenci Ekle</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="search-box-container">
                        <form class="search-form" action="">
                            <input type="text">
                            <button>
                                <i class='bx bx-search'></i>
                            </button>
                        </form>
                    </div>
                    <div class="logout-box">
                        <a href="#" id="logout-button">
                            <i class='bx bx-log-out'></i>
                        </a>
                    </div>
                </div>
            </div> 
        </nav>
    </body>
</html>
