<?php

namespace Database\Seeders;

use App\Models\Cashstation;
use App\Models\CashstationComment;
use App\Models\CashstationReview;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CashstationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cashstation::truncate();
        CashstationComment::truncate();
        CashstationReview::truncate();
        $faker = Faker::create();
        $users = User::get();
        foreach ($users as $user) {
            $open_currency = [
                'PKR' => 1200,
                'INR' => 1200,
                'CAD' => 1200,
                'USD' => 1200
            ];
            $location = [
                'latitude' => $faker->latitude,
                'longitude' => $faker->longitude
            ];
            $services = [
                1 => 'Deposit',
                2 => 'Withdraw',
                3 => 'WithdrawDeposit'
            ];
            $cashstation = new Cashstation();
            $cashstation->user_id = $user->id;
            $cashstation->location = json_encode($location);
            $cashstation->transaction_id = Transaction::all()->random()->id;
            $cashstation->open_currency = json_encode($open_currency);
            $cashstation->services = json_encode($services);
            $cashstation->tagline = $faker->text;
            $cashstation->max_fee_charge = 20;
            $cashstation->save();
            for ($i=0; $i < rand(0, 5) ; $i++) {
                $cashstation_comment = new CashstationComment();
                $cashstation_comment->user_id = $user->id;
                $cashstation_comment->cashstation_id = $cashstation->id;
                $cashstation_comment->comment = $faker->text;
                $cashstation_comment->save();

                $cashstation_review = new CashstationReview();
                $cashstation_review->user_id = $user->id;
                $cashstation_review->cashstation_id = $cashstation->id;
                $cashstation_review->review = $faker->randomDigit;
                $cashstation_review->comment = $faker->text;
                $cashstation_review->save();
            }
        }
    }
}
