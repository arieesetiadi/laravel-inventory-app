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

        $names = [
            UserRole::OWNER => 'Robert Downey',
            UserRole::ADMIN => 'Martin Emerson',
            UserRole::SALES => 'Roger Federer',
            UserRole::PETUGAS_GUDANG => 'Taylor Otwell',
        ];

        $passwords = [
            UserRole::OWNER => Hash::make('owner'),
            UserRole::ADMIN => Hash::make('admin'),
            UserRole::SALES => Hash::make('sales'),
            UserRole::PETUGAS_GUDANG => Hash::make('petugasgudang'),
        ];

        foreach ($roles as $role) {
            User::create([
                'username' => Str::slug($role),
                'password' => $passwords[$role],
                'nama_user' => $names[$role],
                'role' => $role,
            ]);
        }
    }
}
