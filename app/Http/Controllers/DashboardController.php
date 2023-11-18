<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    /**
     * Redirect ke halaman Dashboard.
     */
    public function dashboard()
    {
        return view('pages.dashboard');
    }
}
