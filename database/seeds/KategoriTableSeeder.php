<?php

use App\Kategori;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class KategoriTableSeeder extends Seeder{
    public function run(){
        $now=Carbon::now()->toDateTimeString();
        Kategori::insert([
            ["isim"=>"Dizüstü","url"=>"dizustu","created_at"=>$now,"updated_at"=>$now,"sira"=>0],
            ["isim"=>"Masaüstü","url"=>"masaustu","created_at"=>$now,"updated_at"=>$now,"sira"=>1],
            ["isim"=>"Telefon","url"=>"telefon","created_at"=>$now,"updated_at"=>$now,"sira"=>2],
            ["isim"=>"Tablet","url"=>"tablet","created_at"=>$now,"updated_at"=>$now,"sira"=>3],
            ["isim"=>"Tv","url"=>"tv","created_at"=>$now,"updated_at"=>$now,"sira"=>4],
            ["isim"=>"Kamera","url"=>"kamera","created_at"=>$now,"updated_at"=>$now,"sira"=>5],
        ]);
    }
}
