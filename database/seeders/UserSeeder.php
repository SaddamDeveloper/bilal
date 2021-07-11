<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('users')->delete();
        $uuid = \Uuid::generate()->string;
        DB::table('users')->insert([
            "id"=>$uuid,
        	"username"=>"ages",
        	"email"=>"ages@gmail.com",
            "user_image"=> $faker->imageUrl,
        	"password"=>Hash::make('Password123@'),
            "user_limit"=>10
        ]);
        $uuid = \Uuid::generate()->string;
        DB::table('users')->insert([
            "id"=>$uuid,
            "username"=>"admin",
            "email"=>"admin@wallex.com",
            "user_image"=> $faker->imageUrl,
            "password"=>Hash::make('admin123'),
            "user_limit"=>10
        ]);
        $uuid = \Uuid::generate()->string;
        DB::table('users')->insert([
            "id"=>$uuid,
            "username"=>"user",
            "email"=>"user@wallex.com",
            "user_image"=> $faker->imageUrl,
            "password"=>Hash::make('admin123'),
            "user_limit"=>10
        ]);
    }
}
