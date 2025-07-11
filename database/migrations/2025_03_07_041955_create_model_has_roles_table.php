<?php

use App\Models\Role;
use App\Models\User;
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

        Role::create(['name' => 'ADMIN']);
        Role::create(['name' => 'ADVISOR']);

        User::first()->assignRole('ADMIN');
    }

    public function down(): void
    {
        Schema::dropIfExists('model_has_roles');
    }
};
