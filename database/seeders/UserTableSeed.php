<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmin=Role::where('name','Admin')->first();

        $admin=new User();
        $admin->name='Admin';
        $admin->email='admin@gmail.com';
        $admin->password=Hash::make('1234567');//bycrypt()
        $admin->save();
        $admin->roles()->attach($roleAdmin);


        $roleUser=Role::where('name','User')->first();
        $user=new User();
        $user->name='User';
        $user->email='user@gmail.com';
        $user->password=Hash::make('1234567');//bycrypt()
        $user->save();
        $user->roles()->attach($roleUser);
    }
}
