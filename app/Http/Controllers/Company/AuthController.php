<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login()
    {
        return Inertia::render("Company/Auth/Login");
    }

    public function handleLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (! auth()->attempt(array_merge($request->only(['email', 'password'])),[
            'group'=>'company'
        ])) {
            return redirect()->back()->withInput()->withErrors([
                'email' => 'These credentials do not match our records.',
            ]);
        }

        return redirect()->route('company.dashboard');
    }


    public function register()
    {
        return Inertia::render("Company/Auth/Register");
    }

    public function handleRegister(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'company_name' => 'required',
            'address' => 'required',
            'details' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('public/logos');
        }
        $company = Company::create([
            'name' => $data['company_name'],
            'address' => $data['address'],
            'details' => $data['details'],
            'logo' => $data['logo'],
        ]);
        $user = $company->members()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'group' => 'company',
        ]);
        auth()->login($user);
//        dd(auth()->user()->company());

        return redirect()->route('company.dashboard');
    }
}
