<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Font;
use App\Models\Icon;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SettingApiController extends Controller
{
    public function setInvitationsSettings(Request $request) {

        $settings = Setting::where('name', 'valid_time')->first();

        $settings->value = $request->valid_time;
        $settings->save();
        $settings->refresh();

        return response()->json(['message' => 'Settings updated successfully'], Response::HTTP_CREATED);
    }

    public function addColor(Request $request) {
        Color::create([
            'color_name' => $request->color_name,
            'color_code' => $request->color_code,
        ]);

        return response()->json(['message' => 'Color added successfully'], Response::HTTP_CREATED);
    }

    public function deleteColor(Color $color) {
        $color->delete();

        return response()->json(['message' => 'Color deleted successfully'], Response::HTTP_NO_CONTENT);
    }

    public function addIcon(Request $request) {
        Icon::create([
            'icon_name' => $request->icon_name,
            'icon_code' => $request->icon_code,
            'icon_type' => $request->icon_type,
        ]);

        return response()->json(['message' => 'Icon added successfully'], Response::HTTP_CREATED);
    }

    public function deleteIcon(Icon $icon) {
        $icon->delete();

        return response()->json(['message' => 'Icon deleted successfully'], Response::HTTP_NO_CONTENT);
    }

    public function addFont(Request $request) {
        Font::create([
            'font_name' => $request->font_name,
            'font_family' => $request->font_family,
            'font_url' => $request->font_url,
        ]);

        return response()->json(['message' => 'Font added successfully'], Response::HTTP_CREATED);
    }

    public function deleteFont(Font $font) {
        $font->delete();

        return response()->json(['message' => 'Font deleted successfully'], Response::HTTP_NO_CONTENT);
    }
}
