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
        // Hapus tabel jika sudah ada
        Schema::dropIfExists('pembayaran');

        // Buat tabel baru
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->string('Invoice_ID')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->json('paket_data'); // Menyimpan data paket sebagai JSON
            $table->string('ss_pembayaran'); // Menyimpan path file screenshot pembayaran
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
};
