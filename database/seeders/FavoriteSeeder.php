<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('favorites')->delete();
        $user_id = DB::table("users")->first()->id;
        $pairs = DB::table("pairs")->select("id")->get();

        foreach ($pairs as $key => $value) {
            DB::table('favorites')->insert([
                "pair_id"=>$value->id,
                "user_id"=>$user_id
            ]);
        }
        
    }
}
