<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaydetsTable extends Migration{
    public function up(){
        Schema::create('kaydets', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer("urun_id")->unsigned();
            $table->foreign('urun_id')->references('id')->on('uruns');
            
            $table->integer("kullanici_id")->unsigned();
            $table->foreign('kullanici_id')->references('id')->on('users');

            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('kaydets');
    }
}
