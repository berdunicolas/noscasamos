<?php

use App\Enums\ModuleTypeEnum;
use App\Models\InvitationModule;
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
        InvitationModule::where('type', ModuleTypeEnum::SAVE_DATE)
            ->chunk(100, function ($modules) {
                foreach ($modules as $module) {
                    $data = $module->data ?? [];
                    $data['date_text'] = '';
                    $module->data = $data;
                    $module->save();
                }
            });

        InvitationModule::where('type', ModuleTypeEnum::EVENTS)
            ->chunk(100, function ($modules) {
                foreach ($modules as $module) {
                    $data = $module->data ?? [];
                    $data['civil']['month'] = '';
                    $data['ceremony']['month'] = '';
                    $data['party']['month'] = '';
                    $module->data = $data;
                    $module->save();
                }
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
