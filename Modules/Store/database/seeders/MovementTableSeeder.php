<?php

namespace Modules\Store\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Store\Entities\Movement;
//use Illuminate\Support\Facades\DB;

class MovementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();        

        // $this->call("OthersTableSeeder");
        //DB::statement("INSERT INTO public.movements	VALUES (1, 1, '0001', NOW(), 'XYZ', 'XYZ XYZ XYZ', 'XYZ XYZ XYZ', NULL, '0001', NOW())");
        
        $faker = \Faker\Factory::create();
        
        Movement::create([
            'type_id' => 1,
            'number' => '1',
            'date_time' => date("Y-m-d H:i:s"),
            'subject' => $faker->name,
            'description' => $faker->text(10),
            'observation' => $faker->text(10),
            'support_type_id' => 1,
            'support_number' => '000000000X',
            'support_date' => date("Y-m-d H:i:s")
        ]);

        Movement::create([
            'type_id' => 1,
            'number' => '2',
            'date_time' => date("Y-m-d H:i:s"),
            'subject' => $faker->name,
            'description' => $faker->text(10),
            'observation' => $faker->text(10),                        
            'support_type_id' => 1,
            'support_number' => '000000000Y',
            'support_date' => date("Y-m-d H:i:s")
        ]);
        
        Movement::create([
            'type_id' => 2,
            'number' => '3',
            'date_time' => date("Y-m-d H:i:s"),
            'subject' => $faker->name,
            'description' => $faker->text(10),
            'observation' => $faker->text(10),
            'support_type_id' => 4,
            'support_number' => '000000000X',
            'support_date' => date("Y-m-d H:i:s")
        ]);        
    }
}
