<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;

class ThemeSettingsController extends Controller
{
    public function getSettings()
    {
        $settings = Setting::first();
        return response()->json($settings);
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'logo_url' => 'nullable|url',
            'background_url' => 'nullable|url',
            'welcome_box_enabled' => 'nullable|boolean',
        ]);

        $settings = Setting::first();

        if ($request->has('logo_url')) {
            $settings->logo_url = $request->input('logo_url');
        }

        if ($request->has('background_url')) {
            $settings->background_url = $request->input('background_url');
        }

        if ($request->has('welcome_box_enabled')) {
            $settings->welcome_box_enabled = $request->input('welcome_box_enabled');
        }

        $settings->save();

        return response()->json(['message' => 'Settings updated successfully.']);
    }
}
