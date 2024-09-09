<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cpmks', function (Blueprint $table) {
            $table->id();
            $table->string('id_matkul');
            $table->string('id_indikator');
            $table->string('kode_cpmk');
            $table->string('ket_cpmk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cpmks');
    }
};
