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
        Schema::create('map_sections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('google_map_url');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('map_sections');
    }
};
