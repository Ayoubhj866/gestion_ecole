<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'name' => 'admin',
            'guard_name' => 'web',
        ]); // id 1

        DB::table('roles')->insert([
            'name' => 'eleve',
            'guard_name' => 'web',
        ]);

        DB::table('roles')->insert([
            'name' => 'instructeur',
            'guard_name' => 'web',
        ]);
    }
}
