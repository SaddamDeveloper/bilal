<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EscrowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private function removeDigit($input,$condition){
    	if (strlen($input) > strlen($condition)){
    		return substr($input, 0, -1);
    	}
    	return $input;
    }

    private function directionChangeIfNotOddNumber($input){
	    if($input % 2 == 0){
	        return "SELL";
	    } else{
	        return "BUY";
	    }
    }

    public function run()
    {
    	DB::table('escrows')->truncate();
        $user_id = DB::table("users")->first()->id;
        $users = DB::table("users")->get();

        foreach ($users as $user){
            DB::table('user_balances')->insert([
                "user_id"=>$user->id,
                "currency_id"=>DB::table("currencies")->where('code','USD')->select("id")->first()->id,
                "amount"=>1000
            ]);
        }

        $pairs = DB::table("pairs")->select("id")->get()->toArray();
        for ($i=1; $i <=50 ; $i++) {
	        DB::table('offers')->insert([
	        	"get"=>(float)$i."00",
                "give"=>(float)$i."00",
	        	"user_id"=>$user_id,
	        	"pair_id"=>$pairs[$i-1]->id,
	        	"rating"=>"+".$this->removeDigit($i,2)."%",
                "additional_information"=>"Lorem ipsum sir dol amet",
                "insurance"=>22,
                "status"=>"0%",
	        	"created_at"=>date("Y-m-d H:i:s"),
                "origin"=>"seeder"
	        ]);
        }

        $offers = DB::table("offers")->select("id")->get()->toArray();
        for ($i=1; $i <=50 ; $i++) {
            DB::table('escrows')->insert([
                "direction"=>$this->directionChangeIfNotOddNumber($i),
                "user_id"=>$user_id,
                "offer_id"=>$offers[$i-1]->id,
                "rates"=>"+".$this->removeDigit($i,2)."%",
                "amount"=>(float)$i."00",
                "created_at"=>date("Y-m-d H:i:s")
            ]);
        }
    }
}
