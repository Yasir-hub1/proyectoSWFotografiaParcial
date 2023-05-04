<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad_fotos');
            $table->string('file');
            $table->char('estado');
            $table->unsignedBigInteger('fotografo_id');
            $table->foreign('fotografo_id')->on('fotografos')->references('id');
            $table->unsignedBigInteger('evento_id');
            $table->foreign('evento_id')->on('eventos')->references('id');
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('albums');
    }
}
