<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Panggil seeder untuk roles dan permissions
        $this->call(RolesTableSeeder::class);

        // Panggil seeder untuk admin
        $this->call(AdminSeeder::class);

        // Panggil seeder untuk users
        $this->call(UsersTableSeeder::class);

        // Panggil seeder lainnya jika ada
        // $this->call(OtherSeeder::class);
    }
}
