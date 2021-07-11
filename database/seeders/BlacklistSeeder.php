<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlacklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blacklists')->delete();
        $user_id = DB::table("users")->first()->id;
        $comments = "Lorem ipsum dolor sit amet";

        for ($i=0; $i < 50; $i++) { 
            DB::table('blacklists')->insert([
                "user_id"=>$user_id,
                "blacklisted_username"=>"unamegen".$i,
                "comments"=>$comments
            ]);
        }
    }
}
