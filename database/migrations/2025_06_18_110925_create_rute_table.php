<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
   public function up(): void
{
    Schema::create('tb_rute', function (Blueprint $table) {
        $table->id('id_rute');
        $table->foreignId('id_bus')->constrained('tb_armada', 'id')->onUpdate('cascade')->onDelete('restrict');
        $table->date('tanggal');
        $table->time('berangkat');
        $table->time('tiba');
        $table->integer('harga');
        $table->timestamps(0);
    });
}


    public function down(): void
    {
        Schema::dropIfExists('rute');
    }
};
