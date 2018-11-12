<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingcartTable extends Migration{
    public function up(){
        /*
        Schema::create(config('cart.database.table'), function (Blueprint $table) {
            $table->increments('id');
            $table->integer("urun_id")->unsigned();
            $table->foreign('urun_id')->references('id')->on('uruns');
            $table->integer("kullanici_id")->unsigned();
            $table->foreign('kullanici_id')->references('id')->on('users');
            $table->nullableTimestamps();
        });
        */
    }
    public function down(){
        Schema::drop(config('cart.database.table'));
    }
}
