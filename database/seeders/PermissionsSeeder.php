<?php

// database/seeders/PermissionsSeeder.php
namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        Permission::create(['name' => 'manage categories', 'description' => 'Ability to manage categories']);
        Permission::create(['name' => 'manage subcategories', 'description' => 'Ability to manage subcategories']);
        Permission::create(['name' => 'manage products', 'description' => 'Ability to manage products']);
        Permission::create(['name' => 'view products', 'description' => 'Ability to view products']);
        // Add other permissions as needed
    }
}
