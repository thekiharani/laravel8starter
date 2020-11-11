<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    // constructor
    public function __construct()
    {
        $this->middleware('auth');
    }

    // index
    public function index()
    {
        return view('auth.passwords.change');
    }

    // update
    public function update(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'confirmed'],
            'new_password_confirmation' => ['required', 'string']
        ]);

        $user = $request->user();
        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->route('dashboard')
                ->with('message', 'Password successfully changed.');
        }
        return redirect()->back()
                ->with('error', 'The current password provided is incorrect.');
    }
}
