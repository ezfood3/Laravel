<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
	//
	public function index() {
    // 모델처리: 비지니스 로직 구현
		return view('auth.login'); // resources/auth/login.blade.php
	}

    public function authenticate(Request $request) {
        // credentials == 인증정보
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) { // 로그인 시도
            $request -> session() -> regenerate();

            return redirect() -> intended(RouteServiceProvider::HOME);
        }

        return back() -> withErrors([
            'message' => '메일주소 또는 비밀번호가 올바르지 않습니다.',
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(RouteServiceProvider::HOME);
    }
}
