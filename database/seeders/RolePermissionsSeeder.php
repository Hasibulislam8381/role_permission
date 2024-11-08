<?php

// database/seeders/RolePermissionsSeeder.php
namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RolePermissionsSeeder extends Seeder
{
    public function run()
    {
        $admin = Role::where('name', 'admin')->first();
        $editor = Role::where('name', 'editor')->first();
        $viewer = Role::where('name', 'viewer')->first();

        // Admin gets all permissions
        $admin->permissions()->attach([1, 2, 3, 4]);  // Example permission IDs
        // Editor gets specific permissions
        $editor->permissions()->attach([1, 2, 3]);    // Example permission IDs
        // Viewer gets only 'view products' permission
        $viewer->permissions()->attach([4]);           // Example permission ID
    }
}
