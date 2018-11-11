<?php

use App\Kaydet;
use Illuminate\Database\Seeder;

class KaydetSeederTable extends Seeder{
    public function run(){
        Kaydet::create([
            'urun_id'=>1,
            'kullanici_id'=>1,
        ]);
        Kaydet::create([
            'urun_id'=>5,
            'kullanici_id'=>1,
        ]);
    }
}
