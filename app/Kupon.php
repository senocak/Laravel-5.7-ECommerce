<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Kupon extends Model{
    public static function findByCode($code){
        return self::where("kod",$code)->first();
    }
    public function discount($total){
        if($this->tip=="sabit"){
            return $this->adet;
        }else if($this->tip=="yuzde"){
            return round(($this->yuzde/100)*$total);
        }else{
            return 0;
        }
    }
}
