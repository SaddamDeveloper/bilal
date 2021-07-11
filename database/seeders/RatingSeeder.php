<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ratings')->delete();
        $user_id = DB::table("users")->first()->id;

        DB::table('ratings')->insert([
            'completed_exchanges'=>100,
			'activy_rating'=>100,
			'average_transfer'=>100,
			'average_confirm'=>100,
			'limit_offers'=>10,
			'active_offers'=>10,
			'user_id'=>$user_id
        ]);
        
    }
}
