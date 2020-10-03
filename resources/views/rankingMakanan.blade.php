<!doctype html>

<html>
<!-- Just an image -->
<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/styleHome.css">
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

        <li class="nav-item active">
          <a class="nav-link" href="/rankingMakanan">Ranking Makanan <span class="sr-only">(current)</span></a>
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

  <div class="headerRanking">
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
  
      
    <h5 class="display-4 text-body" style="left: 5cm; position: absolute; top:2cm;">Ranking Makanan</h5>
    <h6 class="display-5 text-body" style="left: 7cm; position: absolute; top:4cm;">Halaman ini digunakan untuk memberikan rekomendasi makanan yang sesuai dengan kebutuhan MakroNutrisi pengguna.</h6>
    <h6 class="display-5 text-body" style="left: 6cm; position: absolute; top:4.6cm;">Pengguna dapat mengatur kandungan Makronutrisi yang diinginkan, dengan menekan tombol ubah kriteria. Setelah menentukan</h6>
    <h6 class="display-5 text-body" style="left: 6cm; position: absolute; top:5.2cm;">kandungan Makronutrisi dari makanan. Web SINMAN akan meranking makanan yang cocok berdasarkan kandungan MakroNutrisi yang dipilih pengguna.</h6>
    <br>
    <br>
    <br>
    <br>
    <table cellspacing="0">
    @csrf
		<thead>
			<tr>
				<th class="text-danger">Nama Makanan</th>
        <th class="text-danger">Kategori Makanan</th>
        <th class="text-danger">Jumlah Kalori</th>
        <th class="text-danger">Rating</th>
			</tr>
		</thead>
		<tbody>
       @foreach($makanan as $data)
       <tr data-href= "{{route('makanan', $data->makanan_id)}}">
        <td>{{$data->namaMakanan}}</td>
        <td>{{$data->kategoriMakanan}}</td>
        <td>{{$data->jumlahKalori}}</td>
        <td>{{$data->nilai_vektorv}}</td>
      </tr>
      @endforeach   
		</tbody>
  </table>
  <br>
  <a href= "/rankingMakanan/ubahKriteria" style="left:11.4cm; position: absolute;"><button type="button" class="btn btn-primary" style="left: 50%;">Ubah Kriteria</button></a>


  </div>

  


  

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
