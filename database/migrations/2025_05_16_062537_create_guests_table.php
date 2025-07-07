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
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invitation_id');
            $table->string('nombre')->nullable();
            $table->string('asiste')->nullable();
            $table->string('nombre_a')->nullable();
            $table->string('alimento')->nullable();
            $table->string('mail')->nullable();
            $table->string('telefono')->nullable();
            $table->string('traslado')->nullable();
            $table->string('comentarios')->nullable();
            
            $table->timestamps();

            $table->foreign('invitation_id')
                ->references('id')
                ->on('invitations')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
