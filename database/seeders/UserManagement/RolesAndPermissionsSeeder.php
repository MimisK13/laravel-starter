<?php

namespace Database\Seeders\UserManagement;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'view_users']);
        Permission::create(['name' => 'add_user']);
        Permission::create(['name' => 'show_user']);
        Permission::create(['name' => 'edit_user']);
        Permission::create(['name' => 'delete_user']);

        Permission::create(['name' => 'view_roles']);
        Permission::create(['name' => 'add_role']);
        Permission::create(['name' => 'show_role']);
        Permission::create(['name' => 'edit_role']);
        Permission::create(['name' => 'delete_role']);

        Permission::create(['name' => 'view_permissions']);
        Permission::create(['name' => 'add_permission']);
        Permission::create(['name' => 'show_permission']);
        Permission::create(['name' => 'edit_permission']);
        Permission::create(['name' => 'delete_permission']);

        Permission::create(['name' => 'view_profile']);
        Permission::create(['name' => 'edit_profile']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo([
            'view_users',
            'show_user',
            'edit_user',
            'view_roles',
            'add_role',
            'show_role',
            'edit_role',
            'view_permissions',
            'add_permission',
            'show_permission',
            'edit_permission',
            'view_profile',
            'edit_profile'
        ]);

        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo([
            'view_profile',
            'edit_profile'
        ]);
    }
}
