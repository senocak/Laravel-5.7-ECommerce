<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Resim extends Model{
    public function urun(){
        return $this->belongsTo('App\Urun');
    }
}