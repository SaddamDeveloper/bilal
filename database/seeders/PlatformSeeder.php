<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('platforms')->delete();
        
        DB::table('platforms')->insert([
            "name"=>"ALIPAY",
            "group"=>"emoney"
        ]);

        DB::table('platforms')->insert([
            "name"=>"APPLE PAY",
            "group"=>"emoney"
        ]);

        DB::table('platforms')->insert([
            "name"=>"GOOGLE PAY",
            "group"=>"emoney"
        ]);

        DB::table('platforms')->insert([
            "name"=>"SKRILL",
            "group"=>"emoney"
        ]);

        DB::table('platforms')->insert([
        	"name"=>"MONEYGRAM",
            "group"=>"cash"
        ]);

        DB::table('platforms')->insert([
        	"name"=>"WESTERN UNION",
            "group"=>"cash"
        ]);

        DB::table('platforms')->insert([
        	"name"=>"PAYPAL",
            "group"=>"emoney"
        ]);

        DB::table('platforms')->insert([
        	"name"=>"MASTERCARD",
            "group"=>"card"
        ]);

        DB::table('platforms')->insert([
        	"name"=>"BITCOIN",
            "group"=>"crypto"
        ]);

        DB::table('platforms')->insert([
            "name"=>"REVOLUT",
            "group"=>"emoney"
        ]);

        DB::table('platforms')->insert([
            "name"=>"PAXUM",
            "group"=>"emoney"
        ]);

        DB::table('platforms')->insert([
            "name"=>"WECHAT PAY",
            "group"=>"emoney"
        ]);

        DB::table('platforms')->insert([
            "name"=>"LINE",
            "group"=>"emoney"
        ]);

        DB::table('platforms')->insert([
            "name"=>"WHATSAPP",
            "group"=>"emoney"
        ]);

        DB::table('platforms')->insert([
            "name"=>"ETHEREUM",
            "group"=>"crypto"
        ]);

        DB::table('platforms')->insert([
            "name"=>"RIPPLE",
            "group"=>"crypto"
        ]);

        DB::table('platforms')->insert([
            "name"=>"USDT",
            "group"=>"crypto"
        ]);

        DB::table('platforms')->insert([
            "name"=>"MONERO",
            "group"=>"crypto"
        ]);

        DB::table('platforms')->insert([
            "name"=>"VISA",
            "group"=>"card"
        ]);

        DB::table('platforms')->insert([
            "name"=>"AMEX",
            "group"=>"card"
        ]);

        DB::table('platforms')->insert([
            "name"=>"UNION PAY",
            "group"=>"card"
        ]);

        DB::table('platforms')->insert([
            "name"=>"VENMO",
            "group"=>"cash"
        ]);

        DB::table('platforms')->insert([
            "name"=>"EMS",
            "group"=>"cash"
        ]);

        DB::table('platforms')->insert([
            "name"=>"XE Money Transfer",
            "group"=>"cash"
        ]);

        DB::table('platforms')->insert([
            "name"=>"WORLDREMIT",
            "group"=>"cash"
        ]);

        DB::table('platforms')->insert([
            "name"=>"TRANSFERWISE",
            "group"=>"cash"
        ]);

        DB::table('platforms')->insert([
            "name"=>"RIA",
            "group"=>"cash"
        ]);

        DB::table('platforms')->insert([
            "name"=>"CURRENCYTRANSFER",
            "group"=>"cash"
        ]);

        DB::table('platforms')->insert([
            "name"=>"INSTAREM",
            "group"=>"cash"
        ]);

        DB::table('platforms')->insert([
            "name"=>"OFX",
            "group"=>"cash"
        ]);

        DB::table('platforms')->insert([
            "name"=>"TRANSFERMATE",
            "group"=>"cash"
        ]);

        DB::table('platforms')->insert([
            "name"=>"GEMINI",
            "group"=>"crypto"
        ]);

        DB::table('platforms')->insert([
            "name"=>"PAXOS STANDARD",
            "group"=>"crypto"
        ]);

        DB::table('platforms')->insert([
            "name"=>"BITPAY",
            "group"=>"crypto"
        ]);

        DB::table('platforms')->insert([
            "name"=>"ELECTRONEUM",
            "group"=>"crypto"
        ]);

        DB::table('platforms')->insert([
            "name"=>"CIRCLE PAY",
            "group"=>"crypto"
        ]);

        DB::table('platforms')->insert([
            "name"=>"COINOMI",
            "group"=>"crypto"
        ]);

        DB::table('platforms')->insert([
            "name"=>"CRYPTOPAY",
            "group"=>"crypto"
        ]);

        DB::table('platforms')->insert([
            "name"=>"BLOCKONOMICS",
            "group"=>"crypto"
        ]);

        DB::table('platforms')->insert([
            "name"=>"GOCOIN",
            "group"=>"crypto"
        ]);

        DB::table('platforms')->insert([
            "name"=>"PAYTOMAT WALLET",
            "group"=>"crypto"
        ]);

        DB::table('platforms')->insert([
            "name"=>"ZUPAGO.PE",
            "group"=>"crypto"
        ]);

        DB::table('platforms')->insert([
            "name"=>"APIRONE",
            "group"=>"crypto"
        ]);

        DB::table('platforms')->insert([
            "name"=>"B2BINPAY",
            "group"=>"crypto"
        ]);

        DB::table('platforms')->insert([
            "name"=>"BITCOMPARE",
            "group"=>"crypto"
        ]);

        DB::table('platforms')->insert([
            "name"=>"BTCPAY",
            "group"=>"crypto"
        ]);

        DB::table('platforms')->insert([
            "name"=>"COINREMITTER",
            "group"=>"crypto"
        ]);

        DB::table('platforms')->insert([
            "name"=>"COINSNAP",
            "group"=>"crypto"
        ]);

        DB::table('platforms')->insert([
            "name"=>"OPENNODE",
            "group"=>"crypto"
        ]);

        DB::table('platforms')->insert([
            "name"=>"XAPO",
            "group"=>"crypto"
        ]);

    }
}