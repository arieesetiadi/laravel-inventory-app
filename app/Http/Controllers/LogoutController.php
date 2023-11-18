<?php

namespace App\Http\Controllers;

use App\Traits\HasWebResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    use HasWebResponses;

    /**
     * Proses logout dari halaman admin.
     */
    public function logout()
    {
        // Proses logout
        Auth::logout();

        // Redirect ke halaman login setelah logout
        return $this->success('Logout berhasil', route('login'));
    }
}
