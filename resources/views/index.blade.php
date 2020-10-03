<!doctype html>

<html>
<!-- Just an image -->
<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="https://use.fontawesome.com/77e631c5d1.js"></script>
  <script src="vue.js"></script>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="logo-image">
        <h5 class="text-danger">Sin</h5>
      </div>
      <div class="logo-image">
      <h5 class="">man</h5>
      </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <a href="/login"> <button class="btn btn-outline-danger nav-link" type="button">Log In</button></a>
      </form>
    </div>
  </nav>

  

  <div class="header">
    @if(\Session::has('alert'))
      <div class="alert alert-success">
        <div>{{Session::get('alert')}}</div>
      </div>
    @endif
    <h1 class="display-4" style=" position: relative; left:5cm; top:3cm;">Menjaga pola makan dengan <h1 class="display-4 text-danger" style=" position: relative; left:5cm; top:3cm;">Sin<h1 class="display-4" style=" position: relative; left:6.9cm; top:1.04cm;">man</h1></h1>.</h1>
    <br>
    <h3 class="" style=" position: relative; left:5cm; top:1cm;"><small>Mulai menjaga pola hidup sehat dengan menjaga pola makan </small></h3>
    <h3 class="" style=" position: relative; left:5cm; top:1cm;"><small>teratur dengan asupan gizi seimbang sesuai kebutuhan tubuh.</small></h3>
    <!-- <a href="/daftar"><button class="btn btn-outline-warning nav-link" style="left: 48%; position: absolute; top:8cm;" type="button">Daftar</button></a> -->
  </div>

  <div class="body">
    <h3 class="" style="text-align: center; position: relative; top:3cm;"><small>Fitur untuk membantu menjaga pola makan</small></h3>
    <br>
    <img src="/../image/bmi.jpg" alt width="44" style=" position: relative;left:5cm; top:4cm;">
    <h4 class="" style=" position: relative;left:6.5cm; top:3cm;"><small>Mengukur Body Mass Index</small></h4>
    <img src="/../image/kalori.png" alt width="44" style=" position: relative;left:21cm; top:1.7cm;">
    <h4 class="" style=" position: relative;left:22.5cm; top:0.7cm;"><small>Mengukur Angka Kecukupan Energi Harian</small></h4>
    <img src="/../image/nutrisi.png" alt width="44" style=" position: relative;left:5cm; top:2.9cm;">
    <h4 class="" style=" position: relative;left:6.5cm; top:1.9cm;"><small>Mengukur Kebutuhan MakroNutrisi Harian</small></h4>
    <img src="/../image/makanan.png" alt width="44" style=" position: relative;left:21cm; top:0.9cm;">
    <h4 class="" style=" position: relative;left:22.5cm;"><small>Memberikan Rekomendasi Makanan</small></h4>

    <!-- <a href="/daftar"><button class="btn btn-outline-warning nav-link" style="left: 48%; position: absolute; top:8cm;" type="button">Daftar</button></a> -->
  </div>

  <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</body>



</html>
