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
        Schema::create('found_animals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('id_Usuario')->references('id')->on('users');
            $table->string('type_Animal');
            $table->string('name_Animal');
            $table->string('breed_Animal');
            $table->string('color_Animal');
            $table->string('gender_Animal');
            $table->string('size_Animal');
            $table->integer('age_Animal');
            $table->string('local_animal')->nullable();
            $table->string('local_Found_Animal')->nullable();
            $table->string('img_Animal')->nullable();
            $table->text('post_Description')->nullable();
            $table->boolean('aproved');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('found_animals');
    }
};
