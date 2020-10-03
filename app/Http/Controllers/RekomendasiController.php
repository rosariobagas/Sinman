<?php

namespace App\Http\Controllers;

use App\rekomendasi;
use DB;
use App\kriteria;
use App\profile;
use App\makanan;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Http\Request;

class RekomendasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data1 = kriteria::where('profile_id', Session::get('id'))->where('namaKriteria', 'Protein')->first();
        $data1->bobotAwal = $request->Protein;
        $data1->save();
        $data2 = kriteria::where('profile_id', Session::get('id'))->where('namaKriteria', 'Lemak')->first();
        $data2->bobotAwal = $request->Lemak;
        $data2->save();
        $data3 = kriteria::where('profile_id', Session::get('id'))->where('namaKriteria', 'Karbohidrat')->first();
        $data3->bobotAwal = $request->Karbohidrat;
        $data3->save();
        $data4 = kriteria::where('profile_id', Session::get('id'))->where('namaKriteria', 'Kalori')->first();
        $data4->bobotAwal = $request->Kalori;
        $data4->save();

        
        $q = DB::table('kriteria')
        ->where('profile_id', Session::get('id'))
        ->sum('bobotAwal') ;

        $kriteria = DB::table('kriteria')->get();
        //foreach($kriteria as $kriteria)
        //{
          //  $kriteria1 = kriteria::where('profile_id',Session::get('id'))->get();
           // $kriteria1->bobotAkhir = $kriteria1->bobotAwal/$temp;
            //$kriteria1->save();
       // }
        
        
            $kriteria1 = kriteria::where('profile_id', Session::get('id'))
            ->where('namaKriteria', 'Protein')->first();
            $kriteria1->bobotAkhir = $kriteria1->bobotAwal/$q;
            if($kriteria1->costBenefit == "Cost")
            {
                $kriteria1->bobotAkhir = -$kriteria1->bobotAkhir;
            }
            $kriteria1->save();

            $kriteria2 = kriteria::where('profile_id', Session::get('id'))
            ->where('namaKriteria', 'Lemak')->first();
            $kriteria2->bobotAkhir = $kriteria2->bobotAwal/$q;
            if($kriteria2->costBenefit == "Cost")
            {
                $kriteria2->bobotAkhir = -$kriteria2->bobotAkhir;
            }
            $kriteria2->save();

            $kriteria3 = kriteria::where('profile_id', Session::get('id'))
            ->where('namaKriteria', 'Karbohidrat')->first();
            $kriteria3->bobotAkhir = $kriteria3->bobotAwal/$q;
            if($kriteria3->costBenefit == "Cost")
            {
                $kriteria3->bobotAkhir = -$kriteria3->bobotAkhir;
            }
            $kriteria3->save();

            $kriteria4 = kriteria::where('profile_id', Session::get('id'))
            ->where('namaKriteria', 'Kalori')->first();
            $kriteria4->bobotAkhir = $kriteria4->bobotAwal/$q;
            if($kriteria4->costBenefit == "Cost")
            {
                $kriteria4->bobotAkhir = -$kriteria4->bobotAkhir;
            }
            $kriteria4->save();

            //    $kriteria1 = DB::table('kriteria')
         //   ->where('profile_id', Session::get('id'))
           // ->where('namaKriteria', 'Karbohidrat')
         //   ->update(['bobotAkhir' =>
          //  'bobotAwal/'.$q]);

        $makanan = DB::table('makanan')->get();
        $rekomendasi = DB::table('rekomendasi')->get();
        foreach($makanan as $m)
        {
            $id=$m->id;
            $karbo = kriteria::where('profile_id', Session::get('id'))->where('namaKriteria', 'Karbohidrat')->first();
            $protein = kriteria::where('profile_id', Session::get('id'))->where('namaKriteria', 'Protein')->first();
            $lemak = kriteria::where('profile_id', Session::get('id'))->where('namaKriteria', 'Lemak')->first();
            $kalori = kriteria::where('profile_id', Session::get('id'))->where('namaKriteria', 'Kalori')->first();
            $makanan = makanan::where('id',$id)->first();
            $rekomendasi = rekomendasi::where('makanan_id',$id)->where('profile_id', Session::get('id'))->first();
            $rekomendasi->nilai_vektors = pow($makanan->Karbohidrat,$karbo->bobotAkhir)*pow($makanan->Protein,$protein->bobotAkhir)*pow($makanan->Lemak,$lemak->bobotAkhir)*pow($makanan->jumlahKalori,$kalori->bobotAkhir);
            $rekomendasi->save();
            
        }

        $sum_vektors = DB::table('rekomendasi')
        ->where('profile_id', Session::get('id'))
        ->sum('nilai_vektors') ;

        $makanan = DB::table('makanan')->get();
        foreach($makanan as $m)
        {
            $id=$m->id;
            $makanan = makanan::where('id',$id)->first();
            $rekomendasi = rekomendasi::where('makanan_id',$id)->where('profile_id', Session::get('id'))->first();
            $rekomendasi->nilai_vektorv = $rekomendasi->nilai_vektors/$sum_vektors;
            $rekomendasi->save();
        }
        return redirect('/rankingMakanan')->with('alert-success','Kriteria berhasil diubah!');


        //if(Session::get('sesi')!=1){
        //    return redirect('login')->with('alert','kamu harus login dulu');
      //  }else{
        //    $makanan = makanan::all();

    //        return view('/home', ['makanan' => $makanan]);
     //   }
    }

    public function ranking()
    {

        //$makanan = makanan::with('rekomendasi')->orderBy('jumlahKalori','desc')->get();
    //     $makanan = makanan::leftJoin('rekomendasi', 'makanan.id', '=', 'rekomendasi.makanan_id')->where('rekomendasi.profile_id','=',Session::get('id'))
    // ->orderBy('rekomendasi.nilai_vektorv', 'DESC')
    // ->get();

   $makanan= DB::table('makanan')
        ->join('rekomendasi', function ($join) {
            $join->on('makanan.id', '=', 'rekomendasi.makanan_id')
                 ->where('rekomendasi.profile_id', '=', Session::get('id'));
        })
        ->orderBy('rekomendasi.nilai_vektorv', 'DESC')->get();
    
        return view('rankingMakanan', ['makanan' => $makanan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\rekomendasi  $rekomendasi
     * @return \Illuminate\Http\Response
     */
    public function show(rekomendasi $rekomendasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\rekomendasi  $rekomendasi
     * @return \Illuminate\Http\Response
     */
    public function edit(rekomendasi $rekomendasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\rekomendasi  $rekomendasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rekomendasi $rekomendasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\rekomendasi  $rekomendasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(rekomendasi $rekomendasi)
    {
        //
    }

    //Slider persentase
    //Persentase Karbohidrat:
    //<div class="slidecontainer">
     // <input type="range" min="1" max="100" value="50" class="slider" id="karbohidrat">
     // <p>Value: <span id="karbo"></span></p>
    //</div>
   // Persentase Protein:
   // <div class="slidecontainer">
    //  <input type="range" min="1" max="100" value="50" class="slider" id="protein">
     // <p>Value: <span id="prot"></span></p>
    //</div>
    //Persentase Lemak:
    //<div class="slidecontainer">
     // <input type="range" min="1" max="100" value="50" class="slider" id="lemak">
     // <p>Value: <span id="lem"></span></p>
    //</div>
    //javascript persentase
   // <script>
//var slider = document.getElementById("karbohidrat");
//var slider = document.getElementById("protein");
//var slider = document.getElementById("lemak");
//var output = document.getElementById("karbo");
//var output = document.getElementById("prot");
//output.innerHTML = slider.value; 
//var output = document.getElementById("lem");
//output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
//slider.oninput = function() {
 // output.innerHTML = this.value;
//}
//</script>
}
