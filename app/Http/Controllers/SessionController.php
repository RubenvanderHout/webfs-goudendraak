<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function Store(Request $request) {
        $validated = $request->validate([
            'id'=>['required','numeric'],
            'password'=>['required']
        ]);

        Auth::attempt($validated);
        request()->session()->regenerate();

        return redirect('/kassa');
    }
}
