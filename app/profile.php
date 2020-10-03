<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    public $table = "profile";
    protected $fillable = [
        'namaDepan', 'namaBelakang',
        'usia',
        'jenisKelamin',
           'username',
            'password',
            'beratBadan',
            'tinggiBadan',
            'bmi',
            'statusBmi',
            'kalori',
            'kaloriDiet',
            'Protein',
            'Lemak',
            'Karbohidrat',
            'aktifitas',
    ];

    public function pilihanMakan(){
        return $this->hasMany(pilihan_sarapan::class);
    }

    public function kriteria(){
        return $this->hasMany(kriteria::class);
    }

    public function rekomendasi(){
        return $this->hasMany(rekomendasi::class);
    }
}
