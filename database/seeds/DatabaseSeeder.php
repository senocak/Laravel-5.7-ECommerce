<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{
    public function run(){
        $this->call(KategoriTableSeeder::class);
        $this->call(UrunsTableSeeder::class);
        $this->call(KuponTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ResimTableseeder::class);
        $this->call(BlogSeederTable::class);
    }
}
