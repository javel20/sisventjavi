<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        $this->call(LocalTableSeeder::class);
        $this->call(TipoTrabajadorTableSeeder::class);
        $this->call(TrabajadorTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CategoriaTableSeeder::class);
        $this->call(ProductoTableSeeder::class);
        $this->call(StockpresentTableSeeder::class);
        $this->call(ProveedorTableSeeder::class);
        $this->call(ClienteTableSeeder::class);
    }
}

