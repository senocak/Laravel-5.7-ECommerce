<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sepet extends Model{
    public function urunler(){
        return $this->belongsTo('App\Urun','urun_id');
    }
    public function resim(){
        return $this->hasMany('App\Resim','urun_id');
    }
}
