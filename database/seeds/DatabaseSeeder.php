<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{
    public function run(){
        $this->call(KategoriTableSeeder::class);
        $this->call(UrunsTableSeeder::class);
    }
}
