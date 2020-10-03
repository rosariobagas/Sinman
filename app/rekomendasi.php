<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rekomendasi extends Model
{
    public $table = "rekomendasi";
    protected $fillable = [
        'makanan_id', 'profile_id', 'nilai_vektors','nilai_vektorv','created_at','updated_at',
    ];

    public function makanan(){
        return $this->belongsTo(makanan::class);
    }

    public function profile(){
        return $this->belongsTo(profile::class);
    }
}
