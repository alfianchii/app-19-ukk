<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // PROPERTIES
    protected array $rules = [
        "username" => ["required"],
        "password" => ["required"],
    ];


    // CORES
    public function index()
    {
        $viewVariables = [
            "title" => "Login",
        ];
        return view('pages.auth.login.index', $viewVariables);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate($this->rules);
        $user = User::firstWhere("username", $credentials["username"]);
        if ($user->flag_active === "N" or $user->deleted_at) return back()->with("error", "Your account has been blocked!");

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->withSuccess("Login successfullyy!");
        }

        return back()->with("error", "The provided credentials do not match our records.");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->withSuccess("Logout successfully!");
    }
}