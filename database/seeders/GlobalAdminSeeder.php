<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GlobalAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('global_admins')->insert([
            'session' => 'SESI I 2022/2023',
            'quota' => '3'
        ]);

        User::create([
            'name' => 'Master Admin',
            'email' => 'admin@gementar.com',
            'password' => bcrypt('temporary_password'),
            'role' => 'Admin'
        ]);


    }
}
