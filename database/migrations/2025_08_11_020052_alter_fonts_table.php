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
        Schema::table('fonts', function (Blueprint $table) {
            $table->string('font_family');
            $table->string('font_url', 500)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fonts', function (Blueprint $table) {
            $table->dropColumn('font_family');
        });
    }
};
