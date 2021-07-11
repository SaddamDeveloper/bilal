<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('escrows')->delete();
        DB::table('pairs')->delete();

        $platforms = DB::table("platforms")->select("id")->get()->toArray();
        $currencies = DB::table("currencies")->select("id")->get()->toArray();
        for ($i=0; $i < 50; $i++) { 
            DB::table('pairs')->insert([
                "platform_id"=>$platforms[$i]->id,
                "currency_id"=>$currencies[$i]->id
            ]);
        }
    }
}
