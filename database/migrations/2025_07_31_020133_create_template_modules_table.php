<?php

use App\Enums\ModuleTypeEnum;
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
        Schema::create('template_modules', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ModuleTypeEnum::keys());
            $table->string('name');
            $table->string('display_name');
            $table->boolean('active')->default(false);
            $table->boolean('on_plan');
            $table->json('data');
            $table->unsignedBigInteger('template_id');
            $table->json('media_collections');
            $table->timestamps();
            $table->integer('index');
            $table->boolean('fixed')->default(true);

            $table->foreign('template_id')->references('id')->on('templates')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('template_modules');
    }
};