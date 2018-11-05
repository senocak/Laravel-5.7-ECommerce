<?php

use App\Kategori;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now=Carbon::now()->toDateTimeString();
        Kategori::insert([
            ["isim"=>"Dizüstü","url"=>"dizustu","created_at"=>$now,"updated_at"=>$now],
            ["isim"=>"Masaüstü","url"=>"masaustu","created_at"=>$now,"updated_at"=>$now],
            ["isim"=>"Telefon","url"=>"telefon","created_at"=>$now,"updated_at"=>$now],
            ["isim"=>"Tablet","url"=>"tablet","created_at"=>$now,"updated_at"=>$now],
            ["isim"=>"Tv","url"=>"tv","created_at"=>$now,"updated_at"=>$now],
            ["isim"=>"Kamera","url"=>"kamera","created_at"=>$now,"updated_at"=>$now],
        ]);
    }
}
