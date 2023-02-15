<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lost_images', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('id_Perdido')->references('id')->on('lost_animals');
            $table->string('name_Img');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lost_images');
    }
};
