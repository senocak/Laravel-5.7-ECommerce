<?php
use App\Resim;
use Illuminate\Database\Seeder;

class ResimTableseeder extends Seeder{
    public function run(){
        for ($i=1; $i <= 5; $i++) {
            Resim::create([
                'resim' => 'laptop-'.$i.".jpg",
                'urun_id' => $i,
            ]);
        }
        Resim::create([
            'resim' => "laptop-2.jpg",
            'urun_id' =>1,
        ]);
    }
}
