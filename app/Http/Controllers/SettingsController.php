<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function view()
    {
        return view('settings');
    }

    public function save(Request $request)
    {
        $settings = Auth::user()->settings;
        if (count($settings) == 0)
        {
            $settings = new \App\Settings();
            $settings->user_id = Auth::user()->id;
        }
        else
        {
            $settings = $settings[0];
        }

        self::change($request, $settings, 'latitude');
        self::change($request, $settings, 'longitude');
        $settings->save();

        return redirect()->route('home');
    }

    private static function change($request, $settings, $name)
    {
        if ($request->input($name))
        {
            $settings->$name = $request->input($name);
        }
    }
}
