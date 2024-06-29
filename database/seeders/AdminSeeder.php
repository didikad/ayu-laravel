<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $admin1 = Admin::firstOrCreate([
            'email' => 'admin1@example.com'
        ], [
            'name' => 'admin',
            'password' => Hash::make('password'),
        ]);
        $admin1->assignRole('admin');

        $admin2 = Admin::firstOrCreate([
            'email' => 'admin2@example.com'
        ], [
            'name' => 'admin',
            'password' => Hash::make('password'),
        ]);
        $admin2->assignRole('admin');

        $superadmin = Admin::firstOrCreate([
            'email' => 'superadmin@example.com'
        ], [
            'name' => 'superadmin',
            'password' => Hash::make('password'),
        ]);
        $superadmin->assignRole('superadmin');
    }
}
