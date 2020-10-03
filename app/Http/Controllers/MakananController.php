<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use App\makanan;
use App\rekomendasi;
use App\profile;
use DB;

class MakananController extends Controller
{

    public function makanan($id){

        $makanan = makanan::find($id);
        return view ('makanan', ['makanan'=>$makanan]);
        
    }

    public function linkMakanan($id){

        $makanan = makanan::find($id);
        return view ('editMakanan', ['makanan'=>$makanan]);
        
    }

    public function updateMakanan($id, Request $request){

        $makanan = makanan::find($id);
        
        if($makanan){
        $makanan->namaMakanan = $request->namaMakanan;
        $makanan->kategoriMakanan = $request->kategoriMakanan;
        $makanan->jumlahKalori = $request->jumlahKalori;
        $makanan->takaranSajian = $request->takaranSajian;
        $makanan->Protein = $request->Protein;
        $makanan->Lemak = $request->Lemak;
        $makanan->Karbohidrat = $request->Karbohidrat;
        
        $makanan->save();
        
        return redirect('/daftarMakanan')->with('alert-success','Berhasil Mengedit Data!');
    }else{
          return redirect('editMakanan',['makanan'=>$makanan])->with('alert','Gagal Mengedit Data !');
    }
        
    }

    public function tambahMakanan(Request $request){
        $this->validate($request, [
            'namaMakanan' => 'required|min:4',
            'kategoriMakanan' => 'required|min:3',
            'jumlahKalori' => 'required',
            'takaranSajian' => 'required',
            'Protein' => 'required',
            'Lemak' => 'required',
            'Karbohidrat' => 'required',
        ]);
        
        $tambah = new makanan;


        $tambah->namaMakanan = $request->namaMakanan;
        $tambah->kategoriMakanan = $request->kategoriMakanan;
        $tambah->jumlahKalori = $request->jumlahKalori;
        $tambah->takaranSajian = $request->takaranSajian;
        $tambah->Protein = $request->Protein;
        $tambah->Lemak = $request->Lemak;
        $tambah->Karbohidrat = $request->Karbohidrat;
        $tambah->save();

        $profile = DB::table('profile')->get();
        foreach($profile as $profile)
        {
            $rekomendasi = new rekomendasi;
            $rekomendasi->makanan_id = $tambah->id;
            $rekomendasi->profile_id = $profile->id;
            $rekomendasi->nilai_vektors = 0;
            $rekomendasi->nilai_vektorv = 0;
            $rekomendasi->save();
        }
        return redirect('/daftarMakanan')->with('alert-success','Berhasil Menambah Makanan!');
        
    }

    public function hapusMakanan($id){
        DB::table('makanan')->where('id',$id)->delete();

        $profile = DB::table('profile')->get();
        foreach($profile as $profile)
        {
            DB::table('rekomendasi')->where('makanan_id',$id)->delete();
        }
        return redirect('/daftarMakanan')->with('alert-success','Berhasil Menghapus Makanan!');
        
    }


    

}
