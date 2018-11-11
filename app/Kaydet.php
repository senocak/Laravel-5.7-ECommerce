<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Kaydet extends Model{
    public function urunler(){
        return $this->belongsTo('App\Urun','urun_id');
    }
}
