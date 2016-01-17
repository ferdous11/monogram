<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    private $models = [
        RolesTableSeeder::class,
        UsersTableSeeder::class,
        StationsTableSeeder::class,
        #CustomersTableSeeder::class,
        #OrdersTableSeeder::class,
        #ProductsTableSeeder::class,
        BatchRoutesTableSeeder::class,
        CategoriesTableSeeder::class,
        StoresTableSeeder::class,
        StatusesTableSeeder::class,
    ];
    public function run ()
    {
        Model::unguard();
        foreach($this->models as $table => $model){
            $this->call($model);
        }
        Model::reguard();
    }
}
