<?php

namespace App\Http\Controllers;

use App\Traits\HasWebResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use HasWebResponses;

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
        // Ambil data dari form login
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        // Cek login
        $result = Auth::attempt($data);

        // Redirect back jika login gagal
        if ($result == false) {
            return $this->failed('Username atau password salah');
        }

        // Redirect ke dashboard jika login berhasil
        return $this->success('Login berhasil', route('dashboard'));
    }
}
