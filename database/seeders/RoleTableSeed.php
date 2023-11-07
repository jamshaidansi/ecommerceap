<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userRoles=new Role();
        $userRoles->name='Admin';
        $userRoles->desc='Its me admin';
        $userRoles->save();

        $roles=new Role();
        $roles->name='User';
        $roles->desc='Its me User';
        $roles->save();
    }
}
