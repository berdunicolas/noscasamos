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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('file_name'); 
            $table->string('file_path'); 
            $table->string('file_type'); // Tipo MIME (ejemplo: image/png, application/pdf)
            $table->string('mediaable_type');
            $table->string('collection_name')->default('default');
            $table->string('disk');
            $table->unsignedBigInteger('mediaable_id');
            $table->timestamps();

            $table->index(['mediaable_type', 'mediaable_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
