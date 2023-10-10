
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
        <div style="height:120px"></div>
        <div style="width:95%; margin:auto;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);" class="wrapper-table">
        <form action="" method="POST">
        <div class="class-list">
            <h1 style="text-align:center;"> {{$sinif_id}} Sınıf Listesi</h1>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->student_no }}</td>
                                <td>{{ $student->student_name }}</td>
                                <td>{{ $student->student_lastname }} </td>
                                <div class="status-box">
                                    <td>{{ $student->student_status }} </td>
                                </div>
                                <div class="student-functions">
                                <td>
                                    <div class="profile-icon">
                                        
                                            <a href="/ogrenci/{{$student->id}}">
                                            <i class='bx bx-user'></i>
                                            </a>
                                            <div class="delete-icon">
                                                <button type="submit" name="delete" value="{{ $student->id }}">
                                                    <i class='bx bx-trash'></i> </button> </div>
                                        
                                    </div>
                                    </td>

                                    </div>



                                </div>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>

        </div>
    </body>
</html>