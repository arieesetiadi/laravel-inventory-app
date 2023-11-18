<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Masuk ke halaman login.
     */
    public function login()
    {
        return view('pages.login');
    }

    /**
     * Proses data login.
     */
    public function prosesLogin(Request $request)
    {
        dd($request->all());
    }
}
