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
        Schema::create('paket_spesial', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket');
            $table->integer('harga');
            $table->text('deskripsi');
            $table->json('gambar');
            $table->json('review')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paket_spesial');
    }
};
