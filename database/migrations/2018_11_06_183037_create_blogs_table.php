<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration{
    public function up(){
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string("baslik");
            $table->string("url")->unique();
            $table->string("resim");
            $table->text("icerik");
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('blogs');
    }
}
