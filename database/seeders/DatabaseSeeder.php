<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CurrencySeeder::class);
        $this->call(PlatformSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AlertSeeder::class);
        $this->call(BindingsSeeder::class);
        $this->call(BlacklistSeeder::class);
        $this->call(FavoriteSeeder::class);
        $this->call(PairSeeder::class);
        $this->call(RatingSeeder::class);
        $this->call(EscrowSeeder::class);
        $this->call(TransactionTypeSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(CashstationsSeeder::class);
        $this->call(CashstationsSeeder::class);
        $this->call(MidrateSeeder::class);
    }
}
