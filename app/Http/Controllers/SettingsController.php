<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\References;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SettingsController extends Controller
{
    //
    public function update(Request $request, $key)
    {
        $validator = Validator::make($request->all(), [
            'key' => ['required', 'in:overtime_method'],
            'value' => ['required', Rule::in(References::where('code', $key)->pluck('id'))],
        ]);

        if($validator->fails())
        {
            return response()->json($validator->messages(), 400);
        }

        $settings = Settings::where('key', $key)->update([
            'value' => $request->value,
            'expression' => References::where([['code', $key], ['id', $request->value]])->first()->expression
        ]);

        return response()->json($settings, 201);
    }
}
