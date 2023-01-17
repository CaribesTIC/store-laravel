<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ProductDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        // php artisan module:migrate-fresh --seed
        $this->call([
            //OthersTableSeeder:class,
            CategoriesTableSeeder::class,
            MarksTableSeeder::class,
            ProductsTableSeeder::class,
            PresentationsTableSeeder::class
        ]);
    }
}
