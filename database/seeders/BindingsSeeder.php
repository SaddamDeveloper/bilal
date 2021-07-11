<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BindingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	DB::table('bindings')->delete();
        $user_id = DB::table("users")->first()->id;
        $account_info = "Lorem ipsum dolor sit amet";
        $platforms = DB::table("platforms")->get();

        foreach ($platforms as $key => $value) { 
            DB::table('bindings')->insert([
                "user_id"=>$user_id,
                "platform_id"=>$value->id,
                "account_info"=>$account_info
            ]);
        }
    }
}
