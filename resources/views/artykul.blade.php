<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <title>Pełna Kulturka</title>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <!-- Vendor CSS Files -->
        <link href="/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <!-- Bahnschrift -->
        <link href="//db.onlinewebfonts.com/c/0a6ee448d1bd65c56f6cf256a7c6f20a?family=Bahnschrift" rel="stylesheet" type="text/css"/>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body>
  <div class="login">
    <a href="{{ url('/') }}"><div class="logbut"><i class="bx bx-home"></i></div></a>
  </div>
    <section id="artykuly" class="filmy section-bg">
        <div class="artykul">
          <div class="section-title">
            @foreach($artykulData as $data)
            <h2>{{$data->tytul}}</h2>
            <img src="{{ url('/img/'.$data->image) }}" class="img-fluid"><br><br>
              <p class="card-title">Autor: {{$data->autor}}</p>
              <div class="text-container">
                <div class="card-text">{{$data->zawartosc}}</div>
              </div>
            </div>    
            @endforeach
        </div>
      </section>
</body>
</html>