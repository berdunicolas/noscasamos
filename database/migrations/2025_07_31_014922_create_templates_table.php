<?php

use App\Enums\EventTypeEnum;
use App\Enums\FontTypeEnum;
use App\Enums\PlanTypeEnum;
use App\Enums\StyleTypeEnum;
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
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();

            $table->enum('event', EventTypeEnum::values());
            $table->enum('plan', PlanTypeEnum::values());
            
            $table->integer('duration')->nullable()->comment('Duración en horas');
            $table->enum('icon_type', ['Animado', 'Estatico']);
            $table->enum('style', StyleTypeEnum::values());
            $table->enum('font', FontTypeEnum::values());
            $table->string('padding')->nullable();
            $table->string('color', 7)->nullable();
            $table->string('background_color', 7)->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('templates');
    }
};
