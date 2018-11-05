<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Urun extends Model{
    public function kategoriler(){
        return $this->belongsToMany('App\Kategori');
    }
}
