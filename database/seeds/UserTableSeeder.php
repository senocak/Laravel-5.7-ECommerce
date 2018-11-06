<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder{
    public function run(){
        User::create([
            'name'=>"Anıl Şenocak",
            'email'=>'anil@bilgimedya.com.tr',
            'password'=>'$2y$10$JejzXiQXwdRzN/kC2q2yOO6mYSA0ZWX2/d61Z8o///17y38eqlIPa',//Admin123
            'admin'=>1,
        ]);
    }
}
