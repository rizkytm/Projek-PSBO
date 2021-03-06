<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Bakul - Bantu Kuliah </title>

    <!-- Bootstrap core CSS -->
    <link href="{{ url('assets/welcome/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ url('assets/welcome/css/half-slider.css') }}" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <p><img src="assets/welcome/gambar/logoputih.png" width="45px" height="45px"></p>
        <a class="navbar-brand" href="#"> Bantu Kuliah</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        	<ul class="navbar-nav ml-auto">
        	@if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('post.index') }}">Home</a></li>
                    @else
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('login') }}">Login </a>
                          <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                        
                    @endauth
                </div>
            @endif
            </ul>
        <!--  <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul> -->
        </div>
      </div>
    </nav>

    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('assets/welcome/gambar/bakulgb2.jpg'); height: 670px">
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('assets/welcome/gambar/bakulbg2.jpg'); height: 670px">
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('assets/welcome/gambar/bakulgb4.jpg'); height: 670px">
            <div class="carousel-caption d-none d-md-block">

            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    <!-- Page Content -->
    <section class="py-5">
      <div class="container">
        <h3 class="text-center">Bantu Kuliah</h3>
        <p class="text-center">Membantu mahasiswa dalam memahami materi perkuliahan<br>dengan teknologi pembelajaran online yang dapat diakses kapan saja dan di mana saja.</p>
      </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Bantu Kuliah 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ url('assets/welcome/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('assets/welcome/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  </body>

</html>