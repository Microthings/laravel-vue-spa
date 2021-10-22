<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'user',
            'username' => 'user',
            'email' => 'user@asepgod.xyz',
            'role' => 'user',
            'password' => bcrypt('user123'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@asepgod.xyz',
            'role' => 'admin',
            'password' => bcrypt('admin123'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'superadmin',
            'username' => 'superadmin',
            'email' => 'superadmin@asepgod.xyz',
            'role' => 'superadmin',
            'password' => bcrypt('i4mg0d'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
