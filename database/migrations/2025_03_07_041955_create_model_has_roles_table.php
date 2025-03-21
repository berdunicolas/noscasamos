<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('model_has_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            $table->morphs('model'); // Relación polimórfica
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('model_has_roles');
    }
};
