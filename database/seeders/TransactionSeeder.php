<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\Transaction;
use App\Models\TransactionType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::truncate();
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            $transaction = new Transaction();
            $transaction->transaction_type_id = TransactionType::all()->random()->id;
            $transaction->sender_id = User::all()->random()->id;
            $transaction->receiver_id = User::all()->random()->id;
            $transaction->currency_id = Currency::all()->random()->id;
            $transaction->amount = $faker->numberBetween($min = 1000, $max = 9000);
            $transaction->note = $faker->name;
            $transaction->save();
        }
    }
}
