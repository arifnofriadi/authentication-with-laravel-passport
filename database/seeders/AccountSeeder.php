<?php

namespace Database\Seeders;

use App\Helper\Enums\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'  => 'Admin BackOffice',
            'email' => 'admin@admin.com',
            'password'  => Hash::make('password'),
            'role_id'  => UserRole::ADMIN
        ]);
    }
}
