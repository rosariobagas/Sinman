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
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
      <a class="nav-link" href="/login"><button type="button" class="btn btn-outline-danger">Log In</button></a>
      </form>
    </div>
  </nav>

  <div class="cont">
      <div class="col">
        <div class="">
        <form action="{{ route('tambah') }}" method="post">
        @csrf
          @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
              </div>
          @endif
          <h1 class="text-danger" class>Daftar:</h1>
          <br>
          <input class="form-control" type="text" name="namaDepan" placeholder="Masukkan Nama Depan" required>
          <br>
          <input class="form-control" type="text" name="namaBelakang" placeholder="Masukkan Nama Belakang" required>
          <br>
          <input class="form-control" type="text" name="usia" placeholder="Masukkan Usia" required>
          <div class="form-group">
            <label for="aktivitas"></label>
              <select class="form-control" id="jenisKelamin" name="jenisKelamin">
                <option value="">Jenis Kelamin</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
              </select>
          </div>
          <input class="form-control" type="text" name="username" placeholder="Masukkan Username" required>
          <br>
          <input class="form-control" type="password" name="password" placeholder="Masukkan Password" required>
          <br>
          <input class="form-control" type="text" name="beratBadan" placeholder="Masukkan Berat Badan (Kg)" required>
          <br>
          <input class="form-control" type="text" name="tinggiBadan" placeholder="Masukkan Tinggi Badan (Cm)" required>
          <div class="form-group">
            <label for="aktivitas"></label>
              <select class="form-control" id="aktifitas" name="aktifitas">
                <option value="">Kegiatan Fisik Harian</option>
                <option value="Sangat Jarang Olahraga">Sangat Jarang Olahraga</option>
                <option value="Jarang Olahraga">Jarang Olahraga</option>
                <option value="Normal Olahraga">Normal Olahraga</option>
                <option value="Sering Olahraga">Sering Olahraga</option>
              </select>
          </div>
          <br>
          <input style="left: 50%;"class="btn btn-light" type="submit">
          </form>
        </div>
        


      </div>
</div>


  <div class="container">
    <section style="height:80px;"></section>
	<div class="row" style="text-align:center;">
	</div>
    <!----------- Footer ------------>
    <footer class="footer-bs">

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
