<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResimsTable extends Migration{
    public function up(){
        Schema::create('resims', function (Blueprint $table) {
            $table->increments('id');
            $table->string("resim");
            $table->integer("urun_id")->unsigned();
            $table->foreign('urun_id')->references('id')->on('uruns');
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('resims');
    }
}
