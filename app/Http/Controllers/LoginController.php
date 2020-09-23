<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('Admin.login');
    
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password]))
        {
            view()->share('user_login',Auth::user()->name);
            return redirect('admin/index');
        }
        else
        {
            return redirect('login')->with('notification','Email or password is incorrect');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}