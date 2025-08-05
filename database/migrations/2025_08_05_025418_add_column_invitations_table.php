<?php

use App\Models\Invitation;
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
        Schema::table('invitations', function (Blueprint $table) {
            $table->boolean('enable_guest_token')->default(false);
            $table->string('guest_token', 5);
        });


        Invitation::where('is_legacy', false)
            ->chunk(100, function ($invitation) {
                foreach ($invitation as $invitation) {
                    $invitation->guest_token = str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);
                    $invitation->save();
                }
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invitations', function (Blueprint $table) {
            $table->dropColumn('enable_guest_token');
            $table->dropColumn('guest_token');
        });
    }
};
