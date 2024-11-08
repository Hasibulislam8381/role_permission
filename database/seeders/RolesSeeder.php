<?php
// database/seeders/RolesSeeder.php
namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'admin', 'description' => 'Administrator with full access']);
        Role::create(['name' => 'editor', 'description' => 'Editor with limited access']);
        Role::create(['name' => 'viewer', 'description' => 'Viewer with read-only access']);
    }
}
