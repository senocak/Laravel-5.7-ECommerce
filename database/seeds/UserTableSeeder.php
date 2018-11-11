<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder{
    public function run(){
        User::create([
            'name'=>"Lorem Ipsum",
            'email'=>'lorem@laravel.com.tr',
            'password'=>'$2y$10$JejzXiQXwdRzN/kC2q2yOO6mYSA0ZWX2/d61Z8o///17y38eqlIPa',//Admin123
            'admin'=>1,
            'resim'=>'lorem.jpg',
        ]);
        User::create([
            'name'=>"Lorem Ipsum2",
            'email'=>'lorem2@laravel.com.tr',
            'password'=>'$2y$10$JejzXiQXwdRzN/kC2q2yOO6mYSA0ZWX2/d61Z8o///17y38eqlIPa',//Admin123
        ]);
    }
}
