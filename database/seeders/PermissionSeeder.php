<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $permissions = [
            'user_management_access',
            'permissions_create',
            'permissions_edit',
            'permissions_show',
            'permissions_delete',
            'permissions_access',
            'roles_create',
            'roles_edit',
            'roles_show',
            'roles_delete',
            'roles_access',
            'users_create',
            'users_edit',
            'users_show',
            'users_delete',
            'users_access',
        ];

        foreach ($permissions as $permission)   {
            Permission::create([
                'name' => $permission
            ]);
        }

        // gets all permissions via Gate::before rule; see AuthServiceProvider
        Role::create(['name' => 'Super Admin']);

        // $user = Role::create(['name' => 'User']);

        // $userPermissions = [
        //     'ingredient_create',
        //     'meal_create',
        //     'meal_edit',
        //     'meal_show',
        //     'meal_delete',
        //     'meal_access',
        //     'comment_create',
        //     'comment_edit',
        //     'comment_show',
        //     'comment_delete',
        //     'comment_access',
        // ];

        // foreach ($userPermissions as $permission)   {
        //     $user->givePermissionTo($permission);
        // }
    }
}
