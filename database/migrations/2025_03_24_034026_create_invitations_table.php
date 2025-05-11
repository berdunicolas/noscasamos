<?php

use App\Enums\FontTypeEnum;
use App\Enums\SpacingTypeEnum;
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
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();

            $table->string('host_names')->nullable();
            $table->string('path_name')->unique();
            $table->unsignedBigInteger('event_id');

            $table->unsignedBigInteger('seller_id')->nullable();
            
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('time_zone')->nullable();
            $table->integer('duration')->nullable()->comment('Duración en horas');
            
            $table->boolean('active')->default(true);
            $table->unsignedBigInteger('created_by')->nullable();
            
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            
            $table->enum('icon_type', ['Animado', 'Estatico']);
            $table->enum('style', StyleTypeEnum::values());
            $table->enum('font', FontTypeEnum::values());
            $table->enum('spacing', SpacingTypeEnum::values());

            $table->string('color', 7)->nullable();
            $table->string('background_color', 7)->nullable();

            $table->json('modules')->nullable();
            
            $table->timestamps();

            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('seller_id')->references('id')->on('sellers')->nullOnDelete();
            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};
