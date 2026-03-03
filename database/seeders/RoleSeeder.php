<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() {

        Role::create([
            'name' => 'gestor_rrhh',
            'guard_name' => 'web',
        ]);
        
        $user = User::create([
            'name' => 'Admin RRHH',
            'email' => 'rrhh@techsolutions.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('gestor_rrhh');
    }
    
}
