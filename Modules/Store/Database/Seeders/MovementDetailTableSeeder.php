<?php

namespace Modules\Store\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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
    }
}


/*INSERT INTO public.movement_details(
	id, movement_id, article_id, quantity, close, user_insert_id, user_update_id, created_at, updated_at)
	VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);
*/
