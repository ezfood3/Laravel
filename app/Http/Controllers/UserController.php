<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as Res;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // 암호화를 위해서

class UserController extends Controller
{
    public function index(Request $request): ViewFactory{
        $user = User::find($request->get('id'));
        return view('user.index',['user'=>$user,]);
    }

    public function store(Request $request): RedirectResponse {
        return Response::redirect('/users');
    }

    public function detail(string $id): ViewFactory {
        return view('user.detail');
    }

    public function userDetail(string $id): ViewFactory {
        return new Res(view('user.detail'), Res::HTTP_OK);
    }

    public function register(UserRegistPost $request) {
        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');

        $user = User::create(
            [
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
            ]
        );
        return view('regist.complete', compact('user'));
    }
}
