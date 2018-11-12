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

        $sira=1;
        for ($i=6; $i <= 10; $i++) {
            Resim::create([
                'resim' => 'masaustu-'.$sira.".jpg",
                'urun_id' => $i,
            ]);
            $sira++;
        }
        
        $sira=1;
        for ($i=11; $i <= 15; $i++) {
            Resim::create([
                'resim' => 'telefon-'.$sira.".jpg",
                'urun_id' => $i,
            ]);
            $sira++;
        }

        $sira=1;
        for ($i=16; $i <= 20; $i++) {
            Resim::create([
                'resim' => 'tablet-'.$sira.".jpg",
                'urun_id' => $i,
            ]);
            $sira++;
        }

        $sira=1;
        for ($i=21; $i <= 25; $i++) {
            Resim::create([
                'resim' => 'tv-'.$sira.".jpg",
                'urun_id' => $i,
            ]);
            $sira++;
        }

        $sira=1;
        for ($i=26; $i <= 30; $i++) {
            Resim::create([
                'resim' => 'kamera-'.$sira.".jpg",
                'urun_id' => $i,
            ]);
            $sira++;
        }



        
    }
}
