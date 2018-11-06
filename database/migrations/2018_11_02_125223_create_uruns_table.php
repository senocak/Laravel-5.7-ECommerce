<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrunsTable extends Migration{
    public function up(){
        Schema::create('uruns', function (Blueprint $table) {
            $table->increments('id');
            $table->string("isim")->unique();
            $table->string("url")->unique();
            $table->string("detay")->nullable();
            $table->integer("fiyat");
            $table->string("aciklama");
            $table->boolean('onecikan')->default(false);
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('uruns');
    }
}
