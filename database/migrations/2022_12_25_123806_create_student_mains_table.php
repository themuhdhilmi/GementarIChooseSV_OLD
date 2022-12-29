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
        Schema::create('student_mains', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('matric_number');
            $table->string('track');
            $table->string('tittle')->nullable();
            $table->string('session')->nullable();
            $table->string('has_abstract_path')->nullable();
            $table->string('has_poster_proposal_path')->nullable();
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
        Schema::dropIfExists('student_mains');
    }
};
