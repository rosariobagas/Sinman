<!doctype html>

<html>
<!-- Just an image -->
<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
  <script src="https://use.fontawesome.com/77e631c5d1.js"></script>
  <script src="vue.js"></script>
</head>
<body style="background-color:whitesmoke;">

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
        <li class="nav-item">
          <a class="nav-link" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/profile">Profile</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="/daftarMakanan">Daftar Makanan</a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="/rankingMakanan">Ranking Makanan  <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/menuHarian">Hitung Kalori Harian</a>
        </li>
      </ul>
      <ul class="navbar-nav mr-right">
      <li class="nav-item">
          <a class="nav-link" href="#">Halo, {{Session::get('namaBelakang')}}</a>
      </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <a href="/"> <button class="btn btn-outline-danger nav-link" type="button">Log Out</button></a>
      </form>
    </div>
  </nav>

  <div class="headerProf">
      
    <h5 class="display-4 text-body" style="left: 5cm; position: absolute; top:2cm;">Ranking Makanan</h5>
    <h4 class="display-5 text-body" style="left: 6cm; position: absolute; top:5cm;">Tingkat Nutrisi</h4>
    <br>
    <div class="colUpdate" style="width: 50%;margin-left: 200px;margin-top: 60px;position: center;background-color:whitesmoke;padding: 20px 0 30px 0;">
    <form action="{{ route('kriteria') }}" method="post">
        @csrf
        @if(\Session::has('alert'))
            <div class="alert alert-danger">
            <div>{{Session::get('alert')}}</div>
            </div>
        @endif
        @if(\Session::has('alert-success'))
            <div class="alert alert-success">
            <div>{{Session::get('alert-success')}}</div>
            </div>
        @endif
      <br><br><br>
      Tingkat Protein:
      <div class="form-group">
            <label for="aktivitas"></label>
              <select class="form-control" id="Protein" name="Protein">
                <option value="3">Tinggi</option>
                <option value="2">Sedang</option>
                <option value="1">Rendah</option>
              </select>
      </div>

      Tingkat Lemak:
      <div class="form-group">
            <label for="aktivitas"></label>
              <select class="form-control" id="Lemak" name="Lemak">
                <option value="1">Tinggi</option>
                <option value="2">Sedang</option>
                <option value="3">Rendah</option>
              </select>
      </div>

      Tingkat Karbohidrat:
      <div class="form-group">
            <label for="aktivitas"></label>
              <select class="form-control" id="Karbohidrat" name="Karbohidrat">
                <option value="3">Tinggi</option>
                <option value="2">Sedang</option>
                <option value="1">Rendah</option>
              </select>
      </div>

      Tingkat Kalori:
      <div class="form-group">
            <label for="aktivitas"></label>
              <select class="form-control" id="Kalori" name="Kalori">
                <option value="3">Tinggi</option>
                <option value="2">Sedang</option>
                <option value="1">Rendah</option>
              </select>
      </div>
      <br>

     
    
    <br>
    <input style="left: 50%;"class="btn btn-primary" type="submit">
</form>
   </div>
  </div>

  


  <div class="container">
    <section style="height:80px;"></section>
	<div class="row" style="text-align:center;">
	</div>
    <!----------- Footer ------------>
    <footer class="footer-bs">
        <div class="row">
        </div>
    </footer>

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
