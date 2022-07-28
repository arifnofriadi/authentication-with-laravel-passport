<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('roles')->count() == 0) {
            DB::table('roles')->insert([
                [
                    'name'  => 'Admin',
                    'description'   =>  'Full Access'
                ],
                [
                    'name'  => 'Employee',
                    'description'   => 'Primary Access'
                ]
            ]);
        } else { echo "\e[31mTable is not empty, therefore NOT "; }

    }
}
