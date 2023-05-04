<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos', function (Blueprint $table) {
            $table->id();
            $table->string('imagen');
            $table->unsignedBigInteger('evento_id');
            $table->char('estado');
            $table->unsignedBigInteger('fotografo_id');
            $table->foreign('fotografo_id')->on('fotografos')->references('id');
            $table->foreign('evento_id')->on('eventos')->references('id')->onDelete('cascade');
            // $table->unsignedBigInteger('album_id');
            // $table->foreign('album_id')->on('albums')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('fotos');
    }
}
