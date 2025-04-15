<?php

use App\Enums\EventTypeEnum;
use App\Enums\PlanTypeEnum;
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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->enum('event', EventTypeEnum::values());
            $table->enum('plan', PlanTypeEnum::values());
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('country_division_id')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            
            $table->timestamps();
            
            $table->foreign('country_id')->references('id')->on('countries')->nullOnDelete();
            $table->foreign('country_division_id')->references('id')->on('country_divisions')->nullOnDelete();
            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
