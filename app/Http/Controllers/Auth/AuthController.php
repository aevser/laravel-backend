<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        return view('auth.index');
    }

    public function login (Request $request){

        $data = $request->validate([
            'email' => ['required', 'email', 'string'],
            'password' => ['required'],
        ]);

        if(auth('web')->attempt($data)){
            return redirect(route('adminHome'));
        }

        return redirect(route('adminLogin'))->withErrors(['email' => 'Пользователь не найден, либо данные неверные']);
    }

    public function logout(){
        auth('web')->logout();

        return redirect(route('home'));
    }
}
