<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menuHarian extends Model
{
    public $table = "menuharian";
    protected $fillable = [
        'profile_id','sarapan', 'kaloriSarapan', 'makanSiang', 'kaloriMakanSiang', 'makanMalam', 'kaloriMakanMalam','snack1', 'kaloriSnack1', 'snack2', 'kaloriSnack2', 'snack3', 'kaloriSnack3', 'totalKalori','created_at','updated_at',
    ];


    public function profile(){
        return $this->belongsTo(profile::class);
    }
}
