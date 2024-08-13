<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login - SISMINU TNI AU'
        ]);
    }

    public function loginproses(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password'))){
            Alert::success('success', 'Login Success')->autoclose(2000)->toToast();
            return redirect()->route('surat-masuk.index');
        }else{
            Alert::error('error', 'Login Failed')->autoclose(2000)->toToast();
            return redirect()->route('surat-masuk.index');
        }
    }

    public function register()
    {
        return view('auth.register', [
            'title' => 'Register - SISMINU TNI AU'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
