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
    Schema::create('tb_transaksi', function (Blueprint $table) {
        $table->id();
        $table->foreignId('jadwal_id')->constrained('tb_rute', 'id_rute')->onDelete('cascade');
        $table->integer('jumlah_kursi');
        $table->integer('total');
        $table->string('status', 20)->default('pending');
        $table->string('metode_bayar', 20)->nullable();
        $table->timestamps();
        $table->timestamp('created_at')->nullable();
        $table->timestamp('updated_at')->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
