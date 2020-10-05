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
          <a class="nav-link" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/profile">Profile</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="/daftarMakanan">Daftar Makanan</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/rankingMakanan">Ranking Makanan</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/menuHarian">Hitung Kalori Harian <span class="sr-only">(current)</span></a>
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

  <div class="headerProf" style="background-color:whitesmoke">
      
    <h5 class="display-4 text-body" style="left: 5cm; position: absolute; top:2cm;">Hitung Kalori Harian</h5>
    <br>
    <div class="colUpdate" style="width: 50%;margin-left: 200px;margin-top: 60px;position: center;padding: 20px 0 30px 0;">
  <form method="post">
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
      <br>
    <h5 class="display-5 text-secondary">Menu ini digunakan untuk men-simulasikan asupan kalori harian berdasarkan makanan</h5>
    <br>
    <br>
    <a class="display-5 text-secondary">Kalori Normal Harian: {{Session::get('kalori')}} Kkal</a>
    <br>
    <a class="display-5 text-secondary">Kalori Diet: {{Session::get('kaloriDiet')}} Kkal</a>
    <br>
    <br>
    Menu Sarapan:
    <div class="form-group">
            <label for="aktivitas"></label>
              <select class="form-control" id="sarapan" name="sarapan">
              <option value=" ">-</option>
              @foreach($makanan as $data)
                <option value="{{$data->jumlahKalori}}">{{$data->namaMakanan}} | Kalori : {{$data->jumlahKalori}}</option>
              @endforeach 
              </select>
    </div>
    <br>
    Menu Makan Siang:
    <div class="form-group">
            <label for="aktivitas"></label>
              <select class="form-control" id="makanSiang" name="makanSiang">
              <option value=" ">-</option>
              @foreach($makanan as $data)
                <option value="{{$data->jumlahKalori}}">{{$data->namaMakanan}} | Kalori : {{$data->jumlahKalori}}</option>
              @endforeach 
              </select>
    </div>
    <br>
    Menu Makan Malam:
    <div class="form-group">
            <label for="aktivitas"></label>
              <select class="form-control" id="makanMalam" name="makanMalam">
              <option value=" ">-</option>
              @foreach($makanan as $data)
              <option value="{{$data->jumlahKalori}}">{{$data->namaMakanan}} | Kalori : {{$data->jumlahKalori}}</option>
              @endforeach 
              </select>
    </div>
    <br>
    Snack 1:
    <div class="form-group">
            <label for="aktivitas"></label>
              <select class="form-control" id="snack1" name="snack1">
              <option value=" ">-</option>
              @foreach($makanan as $data)
              <option value="{{$data->jumlahKalori}}">{{$data->namaMakanan}} | Kalori : {{$data->jumlahKalori}}</option>
              @endforeach 
              </select>
    </div>
    <br>
    Snack 2:
    <div class="form-group">
            <label for="aktivitas"></label>
              <select class="form-control" id="snack2" name="snack2">
              <option value=" ">-</option>
              @foreach($makanan as $data)
                <option value="{{$data->jumlahKalori}}">{{$data->namaMakanan}} | Kalori : {{$data->jumlahKalori}}</option>
              @endforeach 
              </select>
    </div>
    <br>
    Snack 3:
    <div class="form-group">
            <label for="aktivitas"></label>
              <select class="form-control" id="snack3" name="snack3">
              <option value=" ">-</option>
              @foreach($makanan as $data)
                <option value="{{$data->jumlahKalori}}">{{$data->namaMakanan}} | Kalori : {{$data->jumlahKalori}}</option>
              @endforeach 
              </select>
    </div>
    Total Kalori:<input class="form-control" type="text" name="total" readonly id="total">
</form>
   </div>
  </div>


  <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</body>

<script type="text/javascript">
  var sarapan = document.getElementById( "sarapan" ),
  sarapanValue = sarapan.value;
  var makanSiang = document.getElementById( "makanSiang" ),
  makanSiangValue = makanSiang.value;
  var makanMalam = document.getElementById( "makanMalam" ),
  makanMalamValue = makanMalam.value;
  var snack1 = document.getElementById( "snack1" ),
  snack1Value = snack1.value;
  var snack2 = document.getElementById( "snack2" ),
  snack2Value = snack2.value;
  var snack3 = document.getElementById( "snack3" ),
  snack3Value = snack3.value;
  sarapan.onchange=()=>calculate();
  makanSiang.onchange=()=>calculate();
  makanMalam.onchange=()=>calculate();
  snack1.onchange=()=>calculate();
  snack2.onchange=()=>calculate();
  snack3.onchange=()=>calculate();

  function calculate(){
    sarapanValue = sarapan.value;
    makanSiangValue = makanSiang.value;
    makanMalamValue = makanMalam.value;
    snack1Value = snack1.value;
    snack2Value = snack2.value;
    snack3Value = snack3.value;

    var sum = 0;
    var a = +sarapanValue;
    var b = +makanSiangValue;
    var c = +makanMalamValue;
    var d = +snack1Value;
    var e = +snack2Value;
    var f = +snack3Value;

    sum = a + b + c + d + e + f;
    document.getElementById("total").value = sum;
 }
 
  calculate()
</script>

</html>


