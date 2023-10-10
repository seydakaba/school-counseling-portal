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
    <div style="height:100px; width:95%;"></div>
    <div style="margin: 0 auto; width:50%" class="wrapper">
        <form action="" method="post">
            @csrf
            <div class="form-group">
                <textarea style="width:100%; font-size:16px; margin-bottom:10px;border:none; padding:15px; height:300px; border-radius:40px"class="form-control" id="note" name="note" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Not Ekle</button>
        </form>
    </div>
    </div>

</body>
</html>