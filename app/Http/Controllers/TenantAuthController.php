<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Stancl\Tenancy\Facades\Tenancy;
use Log;

class TenantAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user);

            return redirect('dashboard');
        } else {
            return redirect('login');
        }
    }

    public function dashboard()
    {
        $tenantId = app("tenant");
        $users = User::get();
        $userCount = $users->count();

        return view('dashboard', compact('users', 'userCount', 'tenantId'));
    }

}
