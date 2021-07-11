<?php

namespace Database\Seeders;

use App\Models\TransactionType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_types')->delete();
        TransactionType::insert([
            [
                'name' => 'send'
            ],
            [
                'name' => 'receive'
            ],
            [
                'name' => 'request'
            ]
        ]);
    }
}
