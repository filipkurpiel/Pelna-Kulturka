<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <title>Pełna Kulturka</title>
        <meta content="Pełna Kulturka, pelna kulturka, kulturka, pelna, podcast, spotify">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <!-- Vendor CSS Files -->
        <link href="vendor/aos/aos.css" rel="stylesheet">
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <!-- Bahnschrift -->
        <link href="//db.onlinewebfonts.com/c/0a6ee448d1bd65c56f6cf256a7c6f20a?family=Bahnschrift" rel="stylesheet" type="text/css"/>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body>
    <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>
    <header id="header" class="d-flex flex-column justify-content-center">
        <nav id="navbar" class="navbar nav-menu">
            <ul>
                <li><a href="#start" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Start</span></a></li>
                <li><a href="#onas" class="nav-link scrollto"><i class="bx bx-user"></i> <span>O nas</span></a></li>
                <li><a href="#filmy" class="nav-link scrollto"><i class="bx bx-video"></i> <span>Filmy</span></a></li>
                <li><a href="#artykuly" class="nav-link scrollto"><i class="bx bx-notepad"></i> <span>Artykuły</span></a></li>
            </ul>
        </nav>
    </header>
<!-- Początek sekcji głównej -->
    <section id="start" class="d-flex flex-column justify-content-center">
        <div class="container" data-aos="zoom-in" data-aos-delay="100">
            <h1 style="color:white; display: inline;">PEŁNA </h1><h1 style="color: #ffff00; display: inline;">KULTURKA</h1>
            <p><span class="typed" data-typed-items="Artykuły, Filmy, Informacje, Historie"></span></p>
            <div class="social-links">
                <a href="https://www.facebook.com/groups/2914069095479003" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
                <a href="https://www.instagram.com/pelnakulturkapl/" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>
                <a href="https://www.youtube.com/channel/UCkLz7tYMxBTZyzJ1D4NLTEw" class="youtube" target="_blank"><i class="bx bxl-youtube"></i></a>
                <a href="https://open.spotify.com/show/4a5dwHqTqkF3IJlgsWWNSr" class="spotify" target="_blank"><i class="bx bxl-spotify"></i></a>
            </div>

        </div>
    </section>
<!-- Koniec sekcji głównej -->
<!--- Logowanie --->
    <div class="login">
      @if (Route::has('login'))
      @auth
      <a href="{{ url('/home') }}"><div class="logbut"><i class="bx bx-home"></i></div></a>
      <a href="{{ route('logout') }}"><div class="logbut"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
      <i class=" bx bx-log-out-circle"></i></div></a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
      @else
        <a href="{{ route('login') }}"><div class="logbut"><i class="bx bx-log-in-circle"></i></div></a>
      @endauth
    @endif
    </div>
<!---Koniec logowania --->
<!-- Sekcja o nas -->
    <section id="onas" class="onas">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>O nas</h2>
          <p>Nazywamy się Bartek i Hubert, jesteśmy studentami *...*, od zawsze łączyła nas pasja do muzyki i tematów z nią powiązanych, naszą przygodę z social media zaczęliśmy w wieku 13 lat, wypuszczając debiutancki, autorski album naszego zespołu "Misery Machine"</p>
        </div>
      </div>
    </section>
<!-- Koniec sekcji o nas -->
<!-- Sekcja filmy -->
    <section id="filmy" class="filmy section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>filmy</h2>
          <div class="napis">
            <p>Poniżej znajdziecie pare z naszych najnowszych filmików. Zapraszamy do oglądania!</p>
          </div>
          <p></p>
        </div>

    <div class="container-fluid pb-video-container">
      @php
      $API_Key= config('app.google_key');
      $Channel_ID = 'UCkLz7tYMxBTZyzJ1D4NLTEw';
      $Max_Results = 9;
      $apiError = 'Brak filmów';
      $apiData = @file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$Channel_ID.'&maxResults='.$Max_Results.'&key='.$API_Key.'');
      if($apiData){ 
      $videoList = json_decode($apiData); 
        }else{ 
            echo 'Nieprawidłowy klucz API lub ID kanału.'; 
        }
        if(!empty($videoList->items)){ 
            foreach($videoList->items as $item){ 
                // Embed video 
                if(isset($item->id->videoId)){
                    echo '<center>
                            <div class="film">
                                <iframe marginheight="15" width="280" height="150" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="1" allowfullscreen></iframe> 
                                <h5 class="card-title">'. $item->snippet->title .'</h5>
                            </div>
                          </center> ';  
                        }
                }
          }else{ 
              echo '<p class="error">'.$apiError.'</p>';
    
          }
        @endphp
      </div>
    </section>
<!-- Koniec sekcji filmy -->
    <section id="artykuly" class="filmy section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>artykuły</h2>
          @foreach($snippet as $data)
          <div class="card" style="width: 18rem;">
            <a href="{{ url('/artykul/'.$data->id) }}" style="text-decoration: none; color: #45505b">
            <img class="card-img" src="{{ url('/img/'.$data->image) }}">
            <div class="card-body">
            <h5 class="card-title">{{$data->tytul}}</h5>
            <p class="max-lines">{{$data->zawartosc}}</p><br></a>
            </div>
          </div>    
          @endforeach
        </div>
    </section>
<!-- Stopka -->
  <footer id="footer">
    <div class="container">
      <h3 style="color: white; display: inline;">PEŁNA </h3><h3 style="color: #ffff00; display: inline;">KULTURKA</h3>
      <div class="social-links">
            <a href="https://www.facebook.com/groups/2914069095479003" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
            <a href="https://www.instagram.com/pelnakulturkapl/" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>
            <a href="https://www.youtube.com/channel/UCkLz7tYMxBTZyzJ1D4NLTEw" class="youtube" target="_blank"><i class="bx bxl-youtube"></i></a>
            <a href="https://open.spotify.com/show/4a5dwHqTqkF3IJlgsWWNSr" class="spotify" target="_blank"><i class="bx bxl-spotify"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Pełna Kulturka</span></strong>.
      </div>
    </div>
  </footer>
<!-- Koniec Stopki -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    </body>
    <script src="vendor/purecounter/purecounter.js"></script>
    <script src="vendor/aos/aos.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/glightbox/js/glightbox.min.js"></script>
    <script src="vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="vendor/swiper/swiper-bundle.min.js"></script>
    <script src="vendor/typed.js/typed.min.js"></script>
    <script src="vendor/waypoints/noframework.waypoints.js"></script>
    <script src="vendor/php-email-form/validate.js"></script>
    <script src="js/main.js"></script>
</html>