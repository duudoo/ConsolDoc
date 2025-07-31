<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignatureSettingsController extends Controller
{
    public function edit()
    {
        $method = Auth::user()->signature_method ?? 'in-app';
        return view('settings.signature-methods', compact('method'));
    }

    public function update(Request $request)
    {
        $method = $request->input('method');
        $user = Auth::user();
        $user->signature_method = $method;
        $user->save();

        return redirect()->route('settings.signature-method');
    }
}