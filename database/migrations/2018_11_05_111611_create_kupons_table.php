<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKuponsTable extends Migration{
    public function up(){
        Schema::create('kupons', function (Blueprint $table) {
            $table->increments('id');
             $table->string("kod")->unique;
             $table->string("tip")->nullable();
             $table->integer("adet")->nullable();
             $table->integer("yuzde")->nullable();
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('kupons');
    }
}
