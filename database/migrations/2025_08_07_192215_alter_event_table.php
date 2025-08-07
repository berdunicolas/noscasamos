<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE events MODIFY COLUMN event ENUM('Boda', 'Quince', 'Cumple', 'Empresa', 'Infantil')");
    }

    public function down(): void
    {
        // Restaurá los valores anteriores si querés hacer rollback
        DB::statement("ALTER TABLE events MODIFY COLUMN event ENUM('Boda', 'Quince', 'Cumple')");
    }
};
