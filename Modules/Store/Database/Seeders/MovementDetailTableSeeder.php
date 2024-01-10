<?php

namespace Modules\Store\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Store\Entities\MovementDetail;


class MovementDetailTableSeeder extends Seeder
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

        MovementDetail::create([
            'movement_id' => 1,
            'article_id' => 1,
            'quantity' => 10
        ]);

        MovementDetail::create([
            'movement_id' => 1,
            'article_id' => 2,
            'quantity' => 10
        ]);

        MovementDetail::create([
            'movement_id' => 1,
            'article_id' => 3,
            'quantity' => 10
        ]);

        MovementDetail::create([
            'movement_id' => 2,
            'article_id' => 1,
            'quantity' => 10
        ]);

        MovementDetail::create([
            'movement_id' => 2,
            'article_id' => 4,
            'quantity' => 10
        ]);

        MovementDetail::create([
            'movement_id' => 3,
            'article_id' => 1,
            'quantity' => 5
        ]);

        MovementDetail::create([
            'movement_id' => 3,
            'article_id' => 2,
            'quantity' => 5
        ]);


    }
}


/*INSERT INTO public.movement_details(
	id, movement_id, article_id, quantity, close, user_insert_id, user_update_id, created_at, updated_at)
	VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);
*/
