<!doctype html>

<html>
<!-- Just an image -->
<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="https://use.fontawesome.com/77e631c5d1.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
          <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
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
        <a href="/logout"> <button class="btn btn-outline-danger nav-link" type="button">Log Out</button></a>
      </form>
    </div>
  </nav>

  <div class="headerProf">
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
        @php
      $color = "black";
    @endphp
    @if(\Session::get('statusBmi') == "Kekurangan Berat Badan")
      @php
        $color = "CornflowerBlue";
      @endphp
    @endif
    @if(\Session::get('statusBmi') == "Normal")
      @php
        $color = "Green";
      @endphp
    @endif
    @if(\Session::get('statusBmi') == "Kelebihan Berat Badan")
      @php
        $color = "DarkOrange";
      @endphp
    @endif
    @if(\Session::get('statusBmi') == "Obesitas Kelas I")
      @php
        $color = "FireBrick";
      @endphp
    @endif
    @if(\Session::get('statusBmi') == "Obesitas Kelas II")
      @php
        $color = "FireBrick";
      @endphp
    @endif
    @if(\Session::get('statusBmi') == "Obesitas Kelas III")
      @php
        $color = "FireBrick";
      @endphp
    @endif
    <img src="/../image/exercise.png" alt width="44" style=" position: relative;left:6.5cm; top:2.3cm;">
    <h1 class="display-5 text-body" style="left: 8cm; position: absolute; top:3.7cm;">Dietary Information</h1>
    
    <div class="diet">
    <a class="display-5 text-secondary" style="left:7cm; position: absolute;top:7cm;">Body Mass Index: {{Session::get('bmi')}}</a>
    <a class="display-5 text-secondary" style="left:7cm; position: absolute;top: 7.7cm;">Status BMI:</a> <a class="display-5" style="color:{{$color}}; left:9.3cm; position: absolute;top: 7.7cm;">{{Session::get('statusBmi')}}</a>
    <a class="display-5 text-secondary" style="left:7cm; position: absolute;top: 8.4cm;">Jumlah Kalori Yang Dibutuhkan Tubuh Normal: {{Session::get('kalori')}} Kkal</a>
    <a class="display-5 text-secondary" style="left:7cm; position: absolute;top: 9.1cm;">Kalori Diet: {{Session::get('kaloriDiet')}} Kkal</a>
    <a class="display-5 text-secondary" style="left:7cm; position: absolute;top: 9.8cm;">Jumlah Karbohidrat harian: {{Session::get('Karbohidrat')}} Gram</a>
    <a class="display-5 text-secondary" style="left:7cm; position: absolute;top: 10.5cm;">Jumlah Protein harian: {{Session::get('Protein')}} Gram</a>
    <a class="display-5 text-secondary" style="left:7cm; position: absolute;top: 11.2cm;">Jumlah Lemak harian: {{Session::get('Lemak')}} Gram</a>
    <a class="display-5 text-secondary" style="left:7cm; position: absolute;top: 12.9cm;">Aktifitas: {{Session::get('aktifitas')}}</a>
    <a class="display-5 text-secondary" style="left:7cm; position: absolute;top: 13.8cm;"></a><a class="display-5" style="color:FireBrick; left:7cm; position: absolute;top: 13.8cm;">Tidak disarankan mengonsumsi jumlah kalori kurang dari 1200 Kkal</a>
    </div>

    <table cellspacing="0">
		<thead>
			<tr>
				<th>Body Mass Index</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Dibawah 17</td>
				<td>Sangat Kurus</td>
			</tr>
			<tr>
        <td>17.0 - 18.4</td>
			  <td>Kurus</td>
      </tr>
      <tr>
        <td>18.5 - 25.0</td>
			  <td>Normal</td>
      </tr>
      <tr>
        <td>25.1 - 27.0</td>
			  <td>Gemuk</td>
      </tr>
      <tr>
        <td>Diatas 27.0</td>
			  <td>Sangat Gemuk</td>
      </tr>
		</tbody>
	</table>

    
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

<script>
  document.addEventListener("DOMContentLoaded", () =>{
    const rows = document.querySelectorAll("tr[data-href]");

    rows.forEach(row => {
      row.addEventListener("click", () => {
        window.location.href = row.dataset.href;
      });
    });
  });
</script>
</body>


</html>


