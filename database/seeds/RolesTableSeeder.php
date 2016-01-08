<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run ()
    {
        $roleDescriptions = [
            'Store Owner',
            'Supervisor',
            'Inventory Manager',
            'Customer Service',
            'Drop/Shipper',
            'Accountant',
            'Call center/no update',
            'Store owner excluding user management',
            'Only manage users',
        ];
        $roleNames = [
            'OWNER',
            'SUPR',
            'INVM',
            'OPER',
            'VEND',
            'ACCT',
            'CSR',
            'OWNERX',
            'USERM',
        ];
        $index = 0;
        foreach ( $roleDescriptions as $roleDescription ) {
            $role = new Role();
            $role->name = $roleNames[$index];
            $role->display_name = $roleDescription;
            $role->save();

            $index++;
        }
        User::find(1)
            ->attachRole(1);
    }
}
