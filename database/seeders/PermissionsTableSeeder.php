<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'Admin']);
        $user = Role::create(['name' => 'User']);

        //Categories
        Permission::create(['name' => 'crud categories']);

        //Movies
        Permission::create(['name' => 'view movies']);
        Permission::create(['name' => 'add movies']);
        Permission::create(['name' => 'update movies']);
        Permission::create(['name' => 'delete movies']);

        //Clients
        Permission::create(['name' => 'view clients']);
        Permission::create(['name' => 'add clients']);
        Permission::create(['name' => 'update clients']);
        Permission::create(['name' => 'delete clients']);

        //loans
        Permission::create(['name' => 'view loans']);
        Permission::create(['name' => 'add loans']);
        Permission::create(['name' => 'update loans']);
        Permission::create(['name' => 'delete loans']);

        $admin->givePermissionTo([
            'crud categories',

            'view movies',
            'add movies',
            'update movies',
            'delete movies',

            'view clients',
            'add clients',
            'update clients',
            'delete clients',
            
            'view loans',
            'add loans',
            'update loans',
            'delete loans'
        ]);

        $user->givePermissionTo([
            'view loans',
            'view movies',
            'add loans'
        ]);

        $users = User::all();
        foreach ($users as $user) {
            if ($user->role_id != null) {
                $user->assignRole($user->role_id);
            }
    }
}
}
