<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paket_id');
            $table->unsignedBigInteger('user_id');
            $table->string('paket_type');
            $table->text('review');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // Note: Foreign key for paket_id is not defined as it can refer to multiple tables.
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
