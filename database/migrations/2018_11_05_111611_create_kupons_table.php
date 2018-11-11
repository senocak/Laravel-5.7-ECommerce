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
             $table->integer("kullanılan")->default(0);
             $table->integer("yuzde")->nullable();
             $table->date("son_kullanım_tarihi")->default(date("Y-m-d",strtotime("+1 month",strtotime(date("Y-m-d")))));
             $table->integer("aktif")->default("0");
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('kupons');
    }
}
