<?php

use Illuminate\Database\Seeder;
use App\Urun;

class UrunsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Laptops
        for ($i=1; $i <= 30; $i++) {
            Urun::create([
                'isim' => 'Laptop '.$i,
                'url' => 'laptop-'.$i,
                'detay' => [13,14,15][array_rand([13,14,15])] . ' inch, ' . [1, 2, 3][array_rand([1, 2, 3])] .' TB SSD, 32GB RAM',
                'fiyat' => rand(2000,3000),
                'aciklama' =>'Lorem '. $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'onecikan'=>true,
                //'image' => 'products/dummy/laptop-'.$i.'.jpg',
                //'images' => '["products\/dummy\/laptop-2.jpg","products\/dummy\/laptop-3.jpg","products\/dummy\/laptop-4.jpg"]',
            ])->kategoriler()->attach(1);
        }

        // Make Laptop 1 a Desktop as well. Just to test multiple categories
        $urun = Urun::find(1);
        $urun->kategoriler()->attach(2);

        // Desktops
        for ($i = 1; $i <= 9; $i++) {
            Urun::create([
                'isim' => 'Desktop ' . $i,
                'url' => 'desktop-' . $i,
                'detay' => [24, 25, 27][array_rand([24, 25, 27])] . ' inch, ' . [1, 2, 3][array_rand([1, 2, 3])] . ' TB SSD, 32GB RAM',
                'fiyat' => rand(2000,3000),
                'aciklama' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                //'image' => 'products/dummy/desktop-'.$i.'.jpg',
                //'images' => '["products\/dummy\/laptop-2.jpg","products\/dummy\/laptop-3.jpg","products\/dummy\/laptop-4.jpg"]',
            ])->kategoriler()->attach(2);
        }

        // Phones
        for ($i = 1; $i <= 9; $i++) {
            Urun::create([
                'isim' => 'Phone ' . $i,
                'url' => 'phone-' . $i,
                'detay' => [16, 32, 64][array_rand([16, 32, 64])] . 'GB, 5.' . [7, 8, 9][array_rand([7, 8, 9])] . ' inch screen, 4GHz Quad Core',
                'fiyat' => rand(79999, 149999),
                'aciklama' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                //'image' => 'products/dummy/phone-'.$i.'.jpg',
                //'images' => '["products\/dummy\/laptop-2.jpg","products\/dummy\/laptop-3.jpg","products\/dummy\/laptop-4.jpg"]',
            ])->kategoriler()->attach(3);
        }

        // Tablets
        for ($i = 1; $i <= 9; $i++) {
            Urun::create([
                'isim' => 'Tablet ' . $i,
                'url' => 'tablet-' . $i,
                'detay' => [16, 32, 64][array_rand([16, 32, 64])] . 'GB, 5.' . [10, 11, 12][array_rand([10, 11, 12])] . ' inch screen, 4GHz Quad Core',
                'fiyat' => rand(49999, 149999),
                'aciklama' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                //'image' => 'products/dummy/tablet-'.$i.'.jpg',
                //'images' => '["products\/dummy\/laptop-2.jpg","products\/dummy\/laptop-3.jpg","products\/dummy\/laptop-4.jpg"]',
            ])->kategoriler()->attach(4);
        }

        // TVs
        for ($i = 1; $i <= 9; $i++) {
            Urun::create([
                'isim' => 'TV ' . $i,
                'url' => 'tv-' . $i,
                'detay' => [46, 50, 60][array_rand([7, 8, 9])] . ' inch screen, Smart TV, 4K',
                'fiyat' => rand(79999, 149999),
                'aciklama' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                //'image' => 'products/dummy/tv-'.$i.'.jpg',
                //'images' => '["products\/dummy\/laptop-2.jpg","products\/dummy\/laptop-3.jpg","products\/dummy\/laptop-4.jpg"]',
            ])->kategoriler()->attach(5);
        }

        // Cameras
        for ($i = 1; $i <= 9; $i++) {
            Urun::create([
                'isim' => 'Camera ' . $i,
                'url' => 'camera-' . $i,
                'detay' => 'Full Frame DSLR, with 18-55mm kit lens.',
                'fiyat' => rand(79999, 249999),
                'aciklama' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                //'image' => 'products/dummy/camera-'.$i.'.jpg',
                //'images' => '["products\/dummy\/laptop-2.jpg","products\/dummy\/laptop-3.jpg","products\/dummy\/laptop-4.jpg"]',
            ])->kategoriler()->attach(6);
        }


        // Select random entries to be featured
        //Urun::whereIn('id', [1, 12, 22, 31, 41, 43, 47, 51, 53,61, 69, 73, 80])->update(['featured' => true]);
    }
}
