<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class GuestLoginController extends Controller
{
    public function store()
    {
     $email = 'guest@example.com';
     $password = 'password';
     if (Auth::attempt(['email' => $email, 'password' => $password])) {
     //ログイン成功
     return redirect()->intended('dashboard');
    }
     //ログイン失敗
     return redirect()->route('login')->withErrors([
        'email' => 'ゲストログイン失敗しました',
     ]);
    }
}
