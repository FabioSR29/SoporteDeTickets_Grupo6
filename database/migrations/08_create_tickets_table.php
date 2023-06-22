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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion');
            $table->binary('archivo_adjunto')->nullable();
            $table->unsignedBigInteger('idprioridad')->nullable();
            $table->unsignedBigInteger('idestado')->nullable();
            $table->unsignedBigInteger('idagente')->nullable();
            $table->unsignedBigInteger('iduser')->nullable();
            $table->timestamps();

            $table->foreign('idprioridad')->references('id')->on('prioridades');
            $table->foreign('idestado')->references('id')->on('estados');
            $table->foreign('idagente')->references('id')->on('agentes');
            $table->foreign('iduser')->references('id')->on('usuarios');
        });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
