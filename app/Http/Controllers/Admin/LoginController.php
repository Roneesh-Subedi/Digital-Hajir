<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function login()
    {
        return Inertia::render("Admin/Login");
    }

    public function handleLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
//        add group to request
        $request->merge(['group' => 'admin']);

        if (! auth()->attempt($request->only(['email', 'password', 'group']))) {
            return redirect()->back()->withInput()->with('error', 'Invalid credentials.');
        }

        return redirect()->route('admin.dashboard');
    }
}
