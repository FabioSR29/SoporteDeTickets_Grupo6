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
        Schema::create('etiqueta_ticket', function (Blueprint $table) {
            $table->unsignedBigInteger('etiqueta_id');
            $table->unsignedBigInteger('ticket_id');

            $table->foreign('etiqueta_id')->references('id')->on('etiquetas');
            $table->foreign('ticket_id')->references('id')->on('tickets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etiqueta_tickets');
    }
};
