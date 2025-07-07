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
        Schema::table('invitations_logs', function (Blueprint $table) {

            // Relación con la invitación afectada
            $table->foreignId('invitation_id')->constrained()->onDelete('cascade');

            // Usuario que realizó el cambio (opcional)
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');

            // Tipo de acción: created, updated, deleted, disabled, etc.
            $table->string('action');

            // Descripción o detalle (opcional)
            $table->text('description')->nullable();

            // Datos adicionales en formato JSON
            $table->json('data')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invitations_logs', function (Blueprint $table) {
            $table->dropColumn('invitation_id');
            $table->dropColumn('user_id');
            $table->dropColumn('action');
            $table->dropColumn('description');
            $table->dropColumn('data');
        });
    }
};
