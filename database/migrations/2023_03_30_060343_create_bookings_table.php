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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id');
            $table->string('nama_lengkap');
            $table->string('alamat_lengkap');
            $table->string('nomer_wa');
            $table->date("penyewaan");
            $table->date("pengembalian");
            $table->integer("hari");
            $table->decimal("biaya");
            $table->boolean("terkonfirmasi");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
