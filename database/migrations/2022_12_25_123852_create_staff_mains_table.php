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
        Schema::create('staff_mains', function (Blueprint $table) {
            $table->string('email')->unique();
            $table->string('full_name');
            $table->string('track');
            $table->boolean('can_supervise')->default('0');
            $table->string('scopus_id')->nullable();
            $table->string('google_scholar')->nullable();
            $table->integer('consultation_price')->nullable();
            $table->boolean('send_email_notification')->nullable();
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
        Schema::dropIfExists('staff_mains');
    }
};
