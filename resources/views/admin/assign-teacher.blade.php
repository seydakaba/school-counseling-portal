
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
        <div class="">
            <form action="" method="POST">
                @csrf
                <div class="select-boxes">
                    <div class="select-teacher">
                        <select name="ogretmenler" id="ogretmenler" >
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->teacher_name }} {{ $teacher->teacher_lastname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="width:20px"></div>
                    <div style="margin-right:20px" class="select-teacher">
                        <select name="siniflar" id="siniflar">
                            @foreach ($classes as $class)
                                <option value="{{ $class->student_class }}">{{ $class->student_class }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="button-assign">
                    <a href="/kayit/sinif-listesi">
                    <button type="submit" class="btn">Öğretmen Ata</button>
                    </a>
                    </div>

                </div>
            </form>
        </div>
        <div style="width:95%; margin:auto;" class="wrapper-table">
        @php 
        use App\Http\Controllers\ClassController;
        @endphp
            <table>
                <thead>
                    <tr>
                        <td>Sınıf</td>
                        <td>Öğretmen</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classes as $class)
                        <tr>
                            <td>{{ $class->student_class }}</td>
                            <td>
                                @foreach ($teachers as $teacher)
                                    @if ($teacher->id == $class->stu_teacher_id)
                                        {{ $teacher->teacher_name }} {{ $teacher->teacher_lastname }}
                                    @else
                                        {{ $teacher->teacher_name }} {{ $teacher->teacher_lastname }}
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </body>
</html>