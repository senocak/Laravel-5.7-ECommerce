<?php

use App\Kupon;
use Illuminate\Database\Seeder;

class KuponTableSeeder extends Seeder{
    public function run(){
        Kupon::create([
            'kod'=>'ABC123',
            'tip'=>'sabit',
            'adet'=>30,
        ]);
        Kupon::create([
            'kod'=>'DEF456',
            'tip'=>'yuzde',
            'yuzde'=>50,
        ]);
    }
}
