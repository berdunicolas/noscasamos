<?php

use App\Enums\FontTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('invitations', function (Blueprint $table) {
            //  Agregar columna temporal
            $table->string('font_tmp')->nullable()->after('font');
        });

        //  Copiar valores de font a font_tmp
        DB::table('invitations')->where('is_legacy', 0)->update([
            'font_tmp' => DB::raw('font')
        ]);

        Schema::table('invitations', function (Blueprint $table) {
            //  Eliminar la columna enum original
            $table->dropColumn('font');
        });

        Schema::table('invitations', function (Blueprint $table) {
            //  Agregar columna temporal
            $table->string('font')->nullable()->after('font_tmp');
        });

            // Copiar valores de font_tmp a font
        DB::table('invitations')->where('is_legacy', 0)->update([
            'font' => DB::raw('font_tmp')
        ]);

        Schema::table('invitations', function (Blueprint $table) {
            // Eliminar la columna font_tmp
            $table->dropColumn('font_tmp');
        });



        Schema::table('templates', function (Blueprint $table) {
            //  Agregar columna temporal
            $table->string('font_tmp')->nullable()->after('font');
        });

        // Copiar valores de font a font_tmp
        DB::table('templates')->update([
            'font_tmp' => DB::raw('font')
        ]);

        Schema::table('templates', function (Blueprint $table) {
            //  Eliminar la columna enum original
            $table->dropColumn('font');
        });


        Schema::table('templates', function (Blueprint $table) {
            //  Agregar columna temporal
            $table->string('font')->nullable()->after('font_tmp');
        });

        //  Copiar valores de font_tmp a font
        DB::table('templates')->update([
            'font' => DB::raw('font_tmp')
        ]);

        Schema::table('templates', function (Blueprint $table) {
            //  Eliminar la columna font_tmp
            $table->dropColumn('font_tmp');
        });
    }

    public function down(): void
    {
        Schema::table('invitations', function (Blueprint $table) {
            // Volver a poner enum en caso de rollback
            $table->enum('font', FontTypeEnum::values())->nullable();
        });
        Schema::table('templates', function (Blueprint $table) {
            // Volver a poner enum en caso de rollback
            $table->enum('font', FontTypeEnum::values())->nullable();
        });
    }
};
