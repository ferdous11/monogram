<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run ()
    {
        $user = new User();
        $user->username = 'sirajul';
        $user->email = 'sirajul.islam.anik@gmail.com';
        $user->password = '123456';
        $user->vendor_id = 1212;
        $user->zip_code = 121212;
        $user->state = 1;
        $user->save();
        $user->attachRole(1);

    }
}
