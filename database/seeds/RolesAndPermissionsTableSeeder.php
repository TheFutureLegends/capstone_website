<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'showcase.view']);
        Permission::create(['name' => 'showcase.create']);
        Permission::create(['name' => 'showcase.update']);
        Permission::create(['name' => 'showcase.delete']);

        Permission::create(['name' => 'blog.view']);
        Permission::create(['name' => 'blog.create']);
        Permission::create(['name' => 'blog.update']);
        Permission::create(['name' => 'blog.delete']);

        Permission::create(['name' => 'user.view']);
        Permission::create(['name' => 'user.create']);
        Permission::create(['name' => 'user.update']);
        Permission::create(['name' => 'user.delete']);

        $access = Permission::create(['name' => 'dashboard.access']);

        Role::create([
            'name' => 'super-admin',
        ]);

        $author = Role::create([
            'name' => 'author'
        ]);

        $lecturer = Role::create([
            'name' => 'lecturer'
        ]);

        $showcase = Permission::query()->where([
            ['name', 'like', '%showcase.%'],
        ])->get();

        foreach ($showcase as $key => $permission) {
            $lecturer->givePermissionTo($permission->name);
        }

        $blog = Permission::query()->where([
            ['name', 'like', '%blog.%'],
        ])->get();

        foreach ($blog as $key => $permission) {
            $lecturer->givePermissionTo($permission->name);

            $author->givePermissionTo($permission->name);
        }

        $roles = Role::query()->where([
            ['name', '!=', 'super-admin']
        ])->get();

        foreach ($roles as $key => $role) {
            $role->givePermissionTo($access);
        }
    }
}
