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
        Schema::table('invitation_modules', function (Blueprint $table) {
            $table->dropColumn('type');
        });

        Schema::table('invitation_modules', function (Blueprint $table) {
            $table->enum('type', ModuleTypeEnum::keys());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
