<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Constants\UserRole;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = UserRole::values();

        foreach ($roles as $role) {
            User::create([
                'username' => Str::slug($role),
                'password' => Hash::make(Str::slug($role)),
                'nama_user' => $role,
                'role' => $role,
            ]);
        }
    }
}
