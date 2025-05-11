<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(): View{
        $settings = Setting::where('name', 'valid_time')->first();

        return view('admin.settings.index', [
            'settings' => $settings
        ]);
    }


    public function invitationsStore(Request $request): View {

        $settings = Setting::where('name', 'valid_time')->first();

        $settings->value = $request->valid_time;
        $settings->save();
        $settings->refresh();

        return view('admin.settings.index', [
            'settings' => $settings
        ]);
    }
}
