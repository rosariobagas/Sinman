<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use App\profile;
use App\menuharian;
use App\makanan;
use DB;

class MenuController extends Controller
{


    public function tambahMenu(Request $request){
        $tambah = new menuharian;
        $kaloriSarapan = makanan::where('namaMakanan', $request->sarapan)->first();
        if(!$kaloriSarapan){
            $tambah->kaloriSarapan = 0;
        }
        else if($kaloriSarapan){
            $tambah->kaloriSarapan = $kaloriSarapan->jumlahKalori;
        }
        $kaloriSiang = makanan::where('namaMakanan', $request->makanSiang)->first();
        if(!$kaloriSiang){
            $tambah->kaloriMakanSiang = 0;
        }
        else if($kaloriSiang){
            $tambah->kaloriMakanSiang = $kaloriSiang->jumlahKalori;
        }
        $kaloriMalam = makanan::where('namaMakanan', $request->makanMalam)->first();
        if(!$kaloriMalam){
            $tambah->kaloriMakanMalam = 0;
        }
        else if($kaloriMalam){
            $tambah->kaloriMakanMalam = $kaloriMalam->jumlahKalori;
        }
        $kaloriSnack1 = makanan::where('namaMakanan', $request->snack1)->first();
        if(!$kaloriSnack1){
            $tambah->kaloriSnack1 = 0;
        }
        else if($kaloriSnack1){
            $tambah->kaloriSnack1 = $kaloriSnack1->jumlahKalori;
        }
        $kaloriSnack2 = makanan::where('namaMakanan', $request->snack2)->first();
        if(!$kaloriSnack2){
            $tambah->kaloriSnack2 = 0;
        }
        else if($kaloriSnack2){
            $tambah->kaloriSnack2 = $kaloriSnack2->jumlahKalori;
        }
        $kaloriSnack3 = makanan::where('namaMakanan', $request->snack3)->first();
        if(!$kaloriSnack3){
            $tambah->kaloriSnack3 = 0;
        }
        else if($kaloriSnack3){
            $tambah->kaloriSnack3 = $kaloriSnack3->jumlahKalori;
        }
        $profile = $request->session()->get('id');
        $tambah->profile_id = $profile;
        $tambah->sarapan = $request->sarapan;
        $tambah->makanSiang = $request->makanSiang;
        $tambah->makanMalam = $request->makanMalam;
        $tambah->snack1 = $request->snack1;
        $tambah->snack2 = $request->snack2;
        $tambah->snack3 = $request->snack3;

        $tambah->totalKalori = ($tambah->kaloriSarapan+$tambah->kaloriMakanSiang+$tambah->kaloriMakanMalam+$tambah->kaloriSnack1+$tambah->kaloriSnack2+$tambah->kaloriSnack3);
        $tambah->save();

        return redirect('/home')->with('alert-success','Berhasil Menambah Menu!');
        
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
