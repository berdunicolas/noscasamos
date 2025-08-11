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
        Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->string('color_name')->unique();
            $table->string('color_code');
        });
        Schema::create('fonts', function (Blueprint $table) {
            $table->id();
            $table->string('font_name')->unique();
            $table->string('font_url');
        });
        Schema::create('icons', function (Blueprint $table) {
            $table->id();
            $table->string('icon_name');
            $table->string('icon_code');
            $table->enum('icon_type', ['Animado', 'Estatico']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colors');
        Schema::dropIfExists('fonts');
        Schema::dropIfExists('icons');
    }
};
