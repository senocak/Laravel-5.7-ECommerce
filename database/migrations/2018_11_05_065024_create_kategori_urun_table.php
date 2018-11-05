<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategoriUrunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_urun', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("urun_id")->unsigned()->nullable();
            $table->foreign("urun_id")->references("id")->on("uruns")->onDelete("cascade");

            $table->integer("kategori_id")->unsigned()->nullable();
            $table->foreign("kategori_id")->references("id")->on("kategoris")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori_urun');
    }
}
