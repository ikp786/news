<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class AdminUserSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()
    {
        $user = User::create([
            'name'       => 'Admin',
            'role_id'    =>  1,            
            'email'      => 'admin@gmail.com',            
            'password'   => Hash::make('Admin@123'),
        ]);
        $role = Role::find(1);   
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);   
        $user->assignRole([$role->id]);



        $associate = User::create([
            'name'       => 'Highfly Group',
            'role_id'    =>  2,            
            'email'      => 'teamhighflytech@gmail.com',            
            'password'   => Hash::make('Admin@123'),
            'rera_number' => 'RAJ/A/2022/3380',
            'mobile'      => '1234567890'
        ]);
        $role = Role::find(2);
        $associate->assignRole([$role->id]);
    }
}