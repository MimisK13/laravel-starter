<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'super-admin@admin.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole(1);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole(2);

        $user = User::create([
            'name' => 'Moderator',
            'email' => 'moderator@moderator.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole(3);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole(4);

        $user = User::create([
            'name' => 'Banned',
            'email' => 'banned@banned.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole(5);
    }
}
