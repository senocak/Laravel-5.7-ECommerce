<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategorisTable extends Migration{
    public function up(){
        Schema::create('kategoris', function (Blueprint $table) {
            $table->increments('id');
            $table->string("isim")->unique();
            $table->string("url")->unique();
            $table->integer("sira")->default(0);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('kategoris');
    }
}
