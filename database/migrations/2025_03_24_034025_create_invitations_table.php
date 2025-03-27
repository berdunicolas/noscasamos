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
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();

            $table->enum('event', ['Boda', 'Cumple', 'Quince']);
            $table->string('name')->unique();

            $table->unsignedBigInteger('seller_id')->nullable();
            $table->enum('plan', ['Clásico', 'Gold', 'Platino']);

            $table->date('date');
            $table->time('time')->nullable();
            $table->string('time_zone')->nullable();
            $table->integer('duration')->nullable()->comment('Duración en horas');

            $table->boolean('active')->default(true);
            $table->unsignedBigInteger('created_by')->nullable();

            //$table->unsignedBigInteger('country_id')->nullable();
            //$table->unsignedBigInteger('province_id')->nullable();

            $table->string('path_name')->unique();

            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            $table->timestamps();

            $table->foreign('seller_id')->references('id')->on('sellers')->nullOnDelete();
            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
            //$table->foreign('country_id')->references('id')->on('countries')->nullOnDelete();
            //$table->foreign('province_id')->references('id')->on('provinces')->nullOnDelete();
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
