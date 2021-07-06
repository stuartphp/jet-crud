<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();
         DB::table('users')->insert([
            'name' => 'Stuart Harrison',
            'email' => 'stuart@itecassist.co.za',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
         ]);
         /** Roles */
         DB::table('roles')->insert([
             'name'=>'Admin',
             'permissions'=>'SU'
         ]);
         /** Permissions */
         DB::table('permissions')->insert([
            [
                'group'=>'Users',
                'name'=>'Create',
                'code'=>'UC'
            ],
            [
                'group'=>'Users',
                'name'=>'Read',
                'code'=>'UR'
            ],
            [
                'group'=>'Users',
                'name'=>'Update',
                'code'=>'UU'
            ],
            [
                'group'=>'Users',
                'name'=>'Delete',
                'code'=>'UD'
            ],
            [
                'group'=>'Roles',
                'name'=>'Create',
                'code'=>'RC'
            ],
            [
                'group'=>'Roles',
                'name'=>'Read',
                'code'=>'RR'
            ],
            [
                'group'=>'Roles',
                'name'=>'Update',
                'code'=>'RU'
            ],
            [
                'group'=>'Roles',
                'name'=>'Delete',
                'code'=>'RD'
            ],
            [
                'group'=>'Permissions',
                'name'=>'Create',
                'code'=>'PC'
            ],
            [
                'group'=>'Permissions',
                'name'=>'Read',
                'code'=>'PR'
            ],
            [
                'group'=>'Permissions',
                'name'=>'Update',
                'code'=>'PU'
            ],
            [
                'group'=>'Permissions',
                'name'=>'Delete',
                'code'=>'PD'
            ],
            // Super User
            [
                'group'=>'Super User',
                'name'=>'Super User',
                'code'=>'SU'
            ],
         ]);
    }
}
