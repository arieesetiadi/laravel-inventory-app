<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\HasWebResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use HasWebResponses;

    /**
     * Redirect ke halaman profile.
     */
    public function profile()
    {
        return view('pages.profile');
    }

    /**
     * Ubah profil pengguna.
     */
    public function prosesUbahProfile(Request $request)
    {
        // Ambil data user dari form ubah profile
        $data = [
            'username' => $request->username,
            'nama_user' => $request->nama_user,
        ];

        // Enkripsi password jika user mengubahnya
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        // Update data user di database
        $user = User::find(Auth::id());
        $user->update($data);

        // Redirect ke halaman sebelumnya setelah proses ubah profile selesai
        return $this->success('Berhasil mengubah data profile', route('profile'));
    }
}
