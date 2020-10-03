<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use DB;
use App\profile;
use App\kriteria;
use App\makanan;
use App\rekomendasi;

class profileController extends Controller
{
    public function index(){
        
    }
    public function tambah(Request $request){

        $this->validate($request, [
            'namaDepan' => 'required|min:4',
            'namaBelakang' => 'required|min:4',
            'username' => 'required|min:4',
            'password' => 'required',
            'usia' => 'required|max:2',
            'jenisKelamin' => 'required',
        ]);
        

        $tambah = new profile;
        $tambah->namaDepan = $request->namaDepan;
        $tambah->namaBelakang = $request->namaBelakang;
        $tambah->usia = $request->usia;
        $tambah->jenisKelamin = $request->jenisKelamin;
        $tambah->username = $request->username;
        $tambah->password =  bcrypt($request->password);
        $tambah->beratBadan = $request->beratBadan;
        $tambah->tinggiBadan = $request->tinggiBadan;
        $tambah->bmi = number_format($request->beratBadan/(($request->tinggiBadan/100)*($request->tinggiBadan/100)),2);
        if($tambah->bmi<18.5)
        {
            $tambah->statusBmi = "Kekurangan Berat Badan";
        }
        else if($tambah->bmi>=18.5 && $tambah->bmi<=24.9)
        {
            $tambah->statusBmi = "Normal";
        }
        else if($tambah->bmi>=25.0 && $tambah->bmi<=29.9)
        {
            $tambah->statusBmi = "Kelebihan Berat Badan";
        }
        else if($tambah->bmi>=30.0 && $tambah->bmi<=34.9)
        {
            $tambah->statusBmi = "Obesitas Kelas I";
        }
        else if($tambah->bmi>=35.0 && $tambah->bmi<=39.9)
        {
            $tambah->statusBmi = "Obesitas Kelas II";
        }
        else if($tambah->bmi>=40.0)
        {
            $tambah->statusBmi = "Obesitas Kelas III";
        }
        $tambah->aktifitas = $request->aktifitas;
        if($tambah->aktifitas == 'Sangat Jarang Olahraga')
        {
            $valueAktifitas=1.0;    
        }
        else if($tambah->aktifitas == 'Jarang Olahraga')
        {
            if($tambah->jenisKelamin == 'Pria'){
                if($tambah->usia <= 9){
                    $valueAktifitas=1.13;
                }
                else if($tambah->usia >=10 && $tambah->usia<=18){
                    $valueAktifitas=1.13;
                }
                else if($tambah->usia >=19){
                    $valueAktifitas=1.11;
                }
            }
            else if($tambah->jenisKelamin == 'Wanita'){
                if($tambah->usia <= 9){
                    $valueAktifitas=1.16;
                }
                else if($tambah->usia >=10 && $tambah->usia<=18){
                    $valueAktifitas=1.16;
                }
                else if($tambah->usia >=19){
                    $valueAktifitas=1.12;
                }
            }
        }
        else if($tambah->aktifitas == 'Normal Olahraga')
        {
            if($tambah->jenisKelamin == 'Pria'){
                if($tambah->usia <= 9){
                    $valueAktifitas=1.26;
                }
                else if($tambah->usia >=10 && $tambah->usia<=18){
                    $valueAktifitas=1.26;
                }
                else if($tambah->usia >=19){
                    $valueAktifitas=1.25;
                }
            }
            else if($tambah->jenisKelamin == 'Wanita'){
                if($tambah->usia <= 9){
                    $valueAktifitas=1.31;
                }
                else if($tambah->usia >=10 && $tambah->usia<=18){
                    $valueAktifitas=1.31;
                }
                else if($tambah->usia >=19){
                    $valueAktifitas=1.27;
                }
            }
        }
        else if($tambah->aktifitas == 'Sering Olahraga')
        {
            if($tambah->jenisKelamin == 'Pria'){
                if($tambah->usia <= 9){
                    $valueAktifitas=1.42;
                }
                else if($tambah->usia >=10 && $tambah->usia<=18){
                    $valueAktifitas=1.42;
                }
                else if($tambah->usia >=19){
                    $valueAktifitas=1.48;
                }
            }
            else if($tambah->jenisKelamin == 'Wanita'){
                if($tambah->usia <= 9){
                    $valueAktifitas=1.56;
                }
                else if($tambah->usia >=10 && $tambah->usia<=18){
                    $valueAktifitas=1.56;
                }
                else if($tambah->usia >=19){
                    $valueAktifitas=1.45;
                }
            }
        }
        $tambah->valueAktifitas =$valueAktifitas;

        //Perhitungan IOM
        if($tambah->jenisKelamin == "Pria")
        {   
            if($tambah->usia <=9 ){ 
                $kaloriTemp=88.5 - (61.9*$tambah->usia) + ($tambah->valueAktifitas * (26.7*$tambah->beratBadan+903*($tambah->tinggiBadan/100))) + 20;
            }
            else if($tambah->usia >=10 && $tambah->usia <=18 ){
                $kaloriTemp=88.5 - (61.9*$tambah->usia) + ($tambah->valueAktifitas * (26.7*$tambah->beratBadan+903*($tambah->tinggiBadan/100))) + 25;
            }
            else if($tambah->usia >=19 ){
                $kaloriTemp=662 - (9.53*$tambah->usia) + ($tambah->valueAktifitas * (15.91*$tambah->beratBadan+539.6*($tambah->tinggiBadan/100)));
            }
        }
        else if($tambah->jenisKelamin == "Wanita")
        {
            if($tambah->usia <=9 ){ 
                $kaloriTemp=135.3 - (30.8*$tambah->usia) + ($tambah->valueAktifitas * (10*$tambah->beratBadan+934*($tambah->tinggiBadan/100))) + 20;
            }
            else if($tambah->usia >=10 && $tambah->usia <=18 ){ 
                $kaloriTemp=135.3 - (30.8*$tambah->usia) + ($tambah->valueAktifitas * (10*$tambah->beratBadan+934*($tambah->tinggiBadan/100))) + 25;
            }
            else if($tambah->usia >=19 ){
                $kaloriTemp=354 - (6.91*$tambah->usia) + ($tambah->valueAktifitas * (9.36*$tambah->beratBadan+726*($tambah->tinggiBadan/100)));
            }
        }
        


        $kalori=$kaloriTemp;

        

        $tambah->kaloriDiet =$kaloriTemp-500;
        //Perhitungan Nutrisi
        $protein=number_format((($tambah->kaloriDiet*(10/100))/4),2);
        $lemak=number_format((($tambah->kaloriDiet*(25/100))/4),2);
        $karbohidrat=number_format((($tambah->kaloriDiet*(65/100))/4),2);


        $tambah->kalori = $kalori;
        $tambah->Protein = $protein;
        $tambah->Lemak = $lemak;
        $tambah->karbohidrat = $karbohidrat;
        $tambah->save();
        
        $n=1;
        while($n<5){
            $kriteria = new kriteria;
            $kriteria->profile_id = $tambah->id;
            if($n==1){
                $kriteria->namaKriteria = "Protein";
                $kriteria->costBenefit = 'Benefit';
            }
            else if($n==2){
                $kriteria->namaKriteria = "Lemak";
                $kriteria->costBenefit = 'Cost';
            }
            else if($n==3){
                $kriteria->namaKriteria = "Karbohidrat";
                $kriteria->costBenefit = 'Benefit';
                
            }
            else if($n==4){
                $kriteria->namaKriteria = "Kalori";
                $kriteria->costBenefit = 'Cost';
                
            }

            $kriteria->bobotAwal = 0;
            $kriteria->bobotAkhir = 0;
            
            $kriteria->save();
            $n++;    
        }

        $makanan = DB::table('makanan')->get();
        
        foreach($makanan as $makanan)
        {
            $id=$makanan->id;
            $makanan = makanan::where('id',$id)->first();
            $rekomendasi = new rekomendasi;
            $rekomendasi->makanan_id = $makanan->id;
            $rekomendasi->profile_id = $tambah->id;
            $rekomendasi->nilai_vektors = 0;
            $rekomendasi->nilai_vektorv = 0;
            $rekomendasi->save();
        }
        return redirect('/')->with('alert','Berhasil Daftar!');
    }

    public function loginPost(Request $request){

        $username = $request->username;
        $password = $request->password;

        $data = profile::where('username',$username)->first();
        if($data){ 
            if(Hash::check($password,$data->password)){
                Session::put('id',$data->id);
                Session::put('namaDepan',$data->namaDepan);
                Session::put('namaBelakang',$data->namaBelakang);
                Session::put('usia',$data->usia);
                Session::put('jenisKelamin',$data->jenisKelamin);
                Session::put('username',$data->username);
                Session::put('password',$data->password);
                Session::put('beratBadan',$data->beratBadan);
                Session::put('tinggiBadan',$data->tinggiBadan);
                Session::put('bmi',$data->bmi);
                Session::put('statusBmi',$data->statusBmi);
                Session::put('kalori',$data->kalori);
                Session::put('kaloriDiet',$data->kaloriDiet);
                Session::put('Karbohidrat',$data->Karbohidrat);
                Session::put('Protein',$data->Protein);
                Session::put('Lemak',$data->Lemak);
                Session::put('aktifitas',$data->aktifitas);
                Session::put('sesi',1);
                return redirect('home');
            }
            else{
                return redirect('login')->with('alert','Password atau username, Salah !');
            }
        }
        else{
            return redirect('login')->with('alert','Password atau Username, Salah!');
        }
    }

    public function updateUser(Request $request){



        $id = Session::get('id');
        $data = profile::where('id',$id)->first();
        if($data){
        $data->namaDepan = $request->namaDepan;
        $data->namaBelakang = $request->namaBelakang;
        $data->usia = $request->usia;
        $data->jenisKelamin = $request->jenisKelamin;
        $data->beratBadan = $request->beratBadan;
        $data->tinggiBadan = $request->tinggiBadan;
        $data->bmi = number_format($request->beratBadan/(($request->tinggiBadan/100)*($request->tinggiBadan/100)),2);
        if($data->bmi<18.5)
        {
            $data->statusBmi = "Kekurangan Berat Badan";
        }
        else if($data->bmi>=18.5 && $data->bmi<=24.9)
        {
            $data->statusBmi = "Normal";
        }
        else if($data->bmi>=25.0 && $data->bmi<=29.9)
        {
            $data->statusBmi = "Kelebihan Berat Badan";
        }
        else if($data->bmi>=30.0 && $data->bmi<=34.9)
        {
            $data->statusBmi = "Obesitas Kelas I";
        }
        else if($data->bmi>=35.0 && $data->bmi<=39.9)
        {
            $data->statusBmi = "Obesitas Kelas II";
        }
        else if($data->bmi>=40.0)
        {
            $data->statusBmi = "Obesitas Kelas III";
        }
        $data->aktifitas = $request->aktifitas;
        if($data->aktifitas == 'Sangat Jarang Olahraga')
        {
            $valueAktifitas=1.0;    
        }
        else if($data->aktifitas == 'Jarang Olahraga')
        {
            if($data->jenisKelamin == 'Pria'){
                if($data->usia <= 9){
                    $valueAktifitas=1.13;
                }
                else if($data->usia >=10 && $data->usia<=18){
                    $valueAktifitas=1.13;
                }
                else if($data->usia >=19){
                    $valueAktifitas=1.11;
                }
            }
            else if($data->jenisKelamin == 'Wanita'){
                if($data->usia <= 9){
                    $valueAktifitas=1.16;
                }
                else if($data->usia >=10 && $data->usia<=18){
                    $valueAktifitas=1.16;
                }
                else if($data->usia >=19){
                    $valueAktifitas=1.12;
                }
            }
        }
        else if($data->aktifitas == 'Normal Olahraga')
        {
            if($data->jenisKelamin == 'Pria'){
                if($data->usia <= 9){
                    $valueAktifitas=1.26;
                }
                else if($data->usia >=10 && $data->usia<=18){
                    $valueAktifitas=1.26;
                }
                else if($data->usia >=19){
                    $valueAktifitas=1.25;
                }
            }
            else if($data->jenisKelamin == 'Wanita'){
                if($data->usia <= 9){
                    $valueAktifitas=1.31;
                }
                else if($data->usia >=10 && $data->usia<=18){
                    $valueAktifitas=1.31;
                }
                else if($data->usia >=19){
                    $valueAktifitas=1.27;
                }
            }
        }
        else if($data->aktifitas == 'Sering Olahraga')
        {
            if($data->jenisKelamin == 'Pria'){
                if($data->usia <= 9){
                    $valueAktifitas=1.42;
                }
                else if($data->usia >=10 && $data->usia<=18){
                    $valueAktifitas=1.42;
                }
                else if($data->usia >=19){
                    $valueAktifitas=1.48;
                }
            }
            else if($data->jenisKelamin == 'Wanita'){
                if($data->usia <= 9){
                    $valueAktifitas=1.56;
                }
                else if($data->usia >=10 && $data->usia<=18){
                    $valueAktifitas=1.56;
                }
                else if($data->usia >=19){
                    $valueAktifitas=1.45;
                }
            }
        }
        $data->valueAktifitas =$valueAktifitas;

        //Perhitungan Kalori menggunakan rumus IOM
        if($data->jenisKelamin == "Pria")
        {   
            if($data->usia <=9 ){ 
                $kaloriTemp=88.5 - (61.9*$data->usia) + ($data->valueAktifitas * (26.7*$data->beratBadan+903*($data->tinggiBadan/100))) + 20;
            }
            else if($data->usia >=10 && $data->usia <=18 ){
                $kaloriTemp=88.5 - (61.9*$data->usia) + ($data->valueAktifitas * (26.7*$data->beratBadan+903*($data->tinggiBadan/100))) + 25;
            }
            else if($data->usia >=19 ){
                $kaloriTemp=662 - (9.53*$data->usia) + ($data->valueAktifitas * (15.91*$data->beratBadan+539.6*($data->tinggiBadan/100)));
            }
        }
        else if($data->jenisKelamin == "Wanita")
        {
            if($data->usia <=9 ){ 
                $kaloriTemp=135.3 - (30.8*$data->usia) + ($data->valueAktifitas * (10*$data->beratBadan+934*($data->tinggiBadan/100))) + 20;
            }
            else if($data->usia >=10 && $data->usia <=18 ){ 
                $kaloriTemp=135.3 - (30.8*$data->usia) + ($data->valueAktifitas * (10*$data->beratBadan+934*($data->tinggiBadan/100))) + 25;
            }
            else if($data->usia >=19 ){
                $kaloriTemp=354 - (6.91*$data->usia) + ($data->valueAktifitas * (9.36*$data->beratBadan+726*($data->tinggiBadan/100)));
            }
        }
        $kalori=$kaloriTemp;
        $data->kaloriDiet =$kaloriTemp-500;
        $data->kalori = $kalori;
        
        $data->save();
        Session::put('id',$data->id);
        Session::put('namaDepan',$data->namaDepan);
        Session::put('namaBelakang',$data->namaBelakang);
        Session::put('usia',$data->usia);
        Session::put('jenisKelamin',$data->jenisKelamin);
        Session::put('username',$data->username);
        Session::put('beratBadan',$data->beratBadan);
        Session::put('tinggiBadan',$data->tinggiBadan);
        Session::put('bmi',$data->bmi);
        Session::put('statusBmi',$data->statusBmi);
        Session::put('kaloriDiet',$data->kaloriDiet);
        Session::put('kalori',$data->kalori);
        Session::put('aktifitas',$data->aktifitas);
        
        return redirect('profile')->with('alert-success','Berhasil Mengedit Data!');
    }else{
          return redirect('update')->with('alert','Gagal Mengedit Data !');
    }
}

    public function logOut(){
        Session::flush();
        return redirect('login')->with('alert','Log Out Berhasil!!');
    }
}
