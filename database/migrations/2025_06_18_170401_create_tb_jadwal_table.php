<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tb_jadwal', function (Blueprint $table) {
            $table->id(); // int auto_increment
            $table->unsignedBigInteger('bus_id'); // foreign key
            $table->time('bus_start');
            $table->time('bus_end');

            $table->foreign('bus_id')->references('id')->on('tb_armada')
                  ->onDelete('cascade')
                  ->onUpdate('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_jadwal');
    }
};
