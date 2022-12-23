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
        Schema::create('lecturer_infos', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('category');
            $table->string('tittle');
            $table->string('info');
            $table->string('red_text')->nullable();
            $table->string('blue_text')->nullable();
            $table->string('blue_light_text')->nullable();
            $table->string('yellow_text')->nullable();
            $table->string('green_text')->nullable();
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
        Schema::dropIfExists('lecturer_infos');
    }
};
