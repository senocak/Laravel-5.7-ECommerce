<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model{
    public function urunler(){
        return $this->belongsToMany('App\Urun');
    }
}
