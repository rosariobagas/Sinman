<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kriteria extends Model
{
    public $table = "kriteria";
    protected $fillable = [
        'profile_id','namaKriteria','bobotAwal', 'bobotAkhir','costBenefit',
    ];

    public function profile(){
        return $this->belongsTo(profile::class);
    }

}
