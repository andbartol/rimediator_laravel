<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->timestamps();
        });

        Schema::create('outfit', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->decimal('temp_min', 4,2);
            $table->decimal('temp_max', 4,2);
            $table->string('nome');
            $table->timestamps();
        });

        Schema::create('vestito', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->string('nome');
            $table->unsignedbigInteger('user_id');
            $table->bigInteger('tipo_id')->unsigned();
            $table->string('immagine')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('tipo_id')->references('id')->on('tipo');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('indossato', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->dateTime('data');
            $table->boolean('lavato');
            $table->timestamps();
        });

        Schema::create('indossato_vestito', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->unsignedbigInteger('vestito_id');
            $table->unsignedbigInteger('indossato_id');
            $table->timestamps();

            $table->foreign('vestito_id')->references('id')->on('vestito');
            $table->foreign('indossato_id')->references('id')->on('indossato');
        });


        Schema::create('tipo_outfit', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->unsignedbigInteger('tipo_id');
            $table->unsignedbigInteger('outfit_id');
            $table->timestamps();

            $table->foreign('tipo_id')->references('id')->on('tipo');
            $table->foreign('outfit_id')->references('id')->on('outfit');
        });

        Schema::create('disponibile', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('vestito_id');
            $table->boolean('disponibile');
            $table->timestamps();
            $table->foreign('vestito_id')->references('id')->on('vestito');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disponibile');
        Schema::dropIfExists('tipo_outfit');
        Schema::dropIfExists('indossato_vestito');
        Schema::dropIfExists('indossato');
        Schema::dropIfExists('vestito');
        Schema::dropIfExists('outfit');
        Schema::dropIfExists('tipo');
    }
}
