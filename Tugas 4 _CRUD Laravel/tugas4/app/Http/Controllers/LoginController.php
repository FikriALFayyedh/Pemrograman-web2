<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;

class LoginController extends Controller
{
    public function showDataPengguna()
    {
        $datauser['users'] = User::all();

        return view('beranda',compact('datauser'));
    }
    public function postlogin (Request $request)
    {
        if (Auth::attempt($request->only('email','password')))
        {
            return redirect('beranda');
        }
        return redirect ('login');
    }

    public function logout (Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
