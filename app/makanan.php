<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class makanan extends Model
{
    public $table = "makanan";
    protected $fillable = [
        'namaMakanan','kategoriMakanan','takaranSajian','Protein','Lemak','Karbohidrat','jumlahKalori','created_at','updated_at',
    ];


    public function rekomendasi(){
        return $this->hasMany(rekomendasi::class);
    }

    public function pilihanMakan(){
        return $this->hasMany(rekomendasi::class);
    }
}
