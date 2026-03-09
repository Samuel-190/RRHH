<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder  {
    
    public function run() {

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Role::firstOrCreate([
           'name' => 'gestor_rrhh',
           'guard_name' => 'web',
      ]);
    }
}
