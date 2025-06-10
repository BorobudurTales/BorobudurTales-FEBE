<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        $admin = User::create([
            'username' => 'Admin',
            'first_name' => 'Jhon',
            'last_name' => 'Doe',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
        ]);
        $user = User::create([
            'username' => 'andreas',
            'first_name' => 'Adi',
            'last_name' => 'Andre',
            'email' => 'andreas249@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
        ]);

        $admin->assignRole($adminRole);
        $user->assignRole($userRole);
    }
}
