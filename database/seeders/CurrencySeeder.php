<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
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
        DB::table('currencies')->delete();

        DB::table('currencies')->insert([
            "name"=>"Afghani",
            "code"=>"AFN",
            "symbol"=>"Af",
            "country"=>"AFGHANISTAN",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Flag_of_Afghanistan.svg/35px-Flag_of_Afghanistan.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Lek",
            "code"=>"ALL",
            "symbol"=>"L",
            "country"=>"ALBANIA",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/Flag_of_Albania.svg/32px-Flag_of_Albania.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Algerian Dinar",
            "code"=>"DZD",
            "symbol"=>"د.ج",
            "country"=>"ALGERIA",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/7/77/Flag_of_Algeria.svg/35px-Flag_of_Algeria.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Uruguayan Peso",
            "code"=>"UYU",
            "symbol"=>"$",
            "country"=>"Uruguay",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_Uruguay.svg/35px-Flag_of_Uruguay.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Kwanza",
            "code"=>"AOA",
            "symbol"=>"N/A",
            "country"=>"ANGOLA",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/9/9d/Flag_of_Angola.svg/35px-Flag_of_Angola.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Caribbean Dollar",
            "code"=>"XCD",
            "symbol"=>"$",
            "country"=>"ANGUILLA",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/b/b4/Flag_of_Anguilla.svg/35px-Flag_of_Anguilla.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"ARGENTINA",
            "code"=>"ARS",
            "symbol"=>"$",
            "country"=>"ARGENTINA",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/1/1a/Flag_of_Argentina.svg/35px-Flag_of_Argentina.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Armenian Dram",
            "code"=>"AMD",
            "symbol"=>"Դ",
            "country"=>"ARMENIA",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Flag_of_Armenia.svg/35px-Flag_of_Armenia.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Aruban Florin",
            "code"=>"AWG",
            "symbol"=>"Դ",
            "country"=>"ARUBA",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/f/f6/Flag_of_Aruba.svg/35px-Flag_of_Aruba.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Australian Dollar",
            "code"=>"AUD",
            "symbol"=>"$",
            "country"=>"AUSTRALIA",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/8/88/Flag_of_Australia_%28converted%29.svg/35px-Flag_of_Australia_%28converted%29.svg.png",
            "published"=>1
        ]);

        DB::table('currencies')->insert([
            "name"=>"Euro",
            "code"=>"EUR",
            "symbol"=>"€",
            "country"=>"EUROPEAN UNION",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/Flag_of_Europe.svg/35px-Flag_of_Europe.svg.png",
            "published"=>1
        ]);

        DB::table('currencies')->insert([
            "name"=>"Rupiah",
            "code"=>"IDR",
            "symbol"=>"Rp",
            "country"=>"INDONESIA",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Flag_of_Indonesia.svg/35px-Flag_of_Indonesia.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"US Dollar",
            "code"=>"USD",
            "symbol"=>"$",
            "country"=>"UNITED STATES OF AMERICA",
            "flag"=>"https://upload.wikimedia.org/wikipedia/en/thumb/a/a4/Flag_of_the_United_States.svg/35px-Flag_of_the_United_States.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Canadian Dollar",
            "code"=>"CAD",
            "symbol"=>"$",
            "country"=>"Canada",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Flag_of_Canada_%28Pantone%29.svg/35px-Flag_of_Canada_%28Pantone%29.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Cape Verdean Escudo",
            "code"=>"CVE",
            "symbol"=>"$",
            "country"=>"Cabo Verde",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/3/38/Flag_of_Cape_Verde.svg/35px-Flag_of_Cape_Verde.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Cayman Islands Dollar",
            "code"=>"KYD",
            "symbol"=>"$",
            "country"=>"Cayman Islands",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/0/0f/Flag_of_the_Cayman_Islands.svg/35px-Flag_of_the_Cayman_Islands.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Chilean Peso",
            "code"=>"CLP",
            "symbol"=>"$",
            "country"=>"Chile",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Flag_of_Chile.svg/35px-Flag_of_Chile.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Chinese Yuan",
            "code"=>"CNY",
            "symbol"=>"¥",
            "country"=>"China",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Flag_of_the_People%27s_Republic_of_China.svg/35px-Flag_of_the_People%27s_Republic_of_China.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Colombian Peso",
            "code"=>"COP",
            "symbol"=>"$",
            "country"=>"Colombia",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Flag_of_Colombia.svg/35px-Flag_of_Colombia.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Comoro Franc",
            "code"=>"KMF",
            "symbol"=>"CF",
            "country"=>"Comoros",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/9/94/Flag_of_the_Comoros.svg/35px-Flag_of_the_Comoros.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Congolese Franc",
            "code"=>"CDF",
            "symbol"=>"FC",
            "country"=>"Democratic Republic of the Congo",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Flag_of_the_Democratic_Republic_of_the_Congo.svg/31px-Flag_of_the_Democratic_Republic_of_the_Congo.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Costa Rican Colon",
            "code"=>"CRC",
            "symbol"=>"₡",
            "country"=>"Costa Rica",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/f/f2/Flag_of_Costa_Rica.svg/35px-Flag_of_Costa_Rica.svg.png",
            "published"=>1
        ]);

        DB::table('currencies')->insert([
            "name"=>"Croatian Kuna",
            "code"=>"CRC",
            "symbol"=>"kn",
            "country"=>"Croatia",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Flag_of_Croatia.svg/35px-Flag_of_Croatia.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Cuban Convertible Peso",
            "code"=>"CUC",
            "symbol"=>"₱",
            "country"=>"Cuba",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/b/bd/Flag_of_Cuba.svg/35px-Flag_of_Cuba.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Cuban Peso",
            "code"=>"CUP",
            "symbol"=>"₱",
            "country"=>"Cuba",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/b/bd/Flag_of_Cuba.svg/35px-Flag_of_Cuba.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Czech Koruna",
            "code"=>"CZK",
            "symbol"=>"Kč",
            "country"=>"Czechia",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/c/cb/Flag_of_the_Czech_Republic.svg/35px-Flag_of_the_Czech_Republic.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Djiboutian Franc",
            "code"=>"DJF",
            "symbol"=>"Fdj",
            "country"=>"Djibouti",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/3/34/Flag_of_Djibouti.svg/35px-Flag_of_Djibouti.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Dominican Peso",
            "code"=>"DOP",
            "symbol"=>"RD$",
            "country"=>"Dominican Republic",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Flag_of_the_Dominican_Republic.svg/35px-Flag_of_the_Dominican_Republic.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Egyptian Pound",
            "code"=>"EGP",
            "symbol"=>"£",
            "country"=>"Egypt",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_Egypt.svg/35px-Flag_of_Egypt.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Eritrean Nakfa",
            "code"=>"ERN",
            "symbol"=>"Nfk",
            "country"=>"Eritrea",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/2/29/Flag_of_Eritrea.svg/35px-Flag_of_Eritrea.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Ethiopian Birr",
            "code"=>"ETB",
            "symbol"=>"Br",
            "country"=>"Ethiopia",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/7/71/Flag_of_Ethiopia.svg/35px-Flag_of_Ethiopia.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Falkland Islands Pound",
            "code"=>"FKP",
            "symbol"=>"£",
            "country"=>"Falkland Islands",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Flag_of_the_Falkland_Islands.svg/35px-Flag_of_the_Falkland_Islands.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Fiji Dollar",
            "code"=>"FJD",
            "symbol"=>"$",
            "country"=>"Fiji",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/Flag_of_Fiji.svg/35px-Flag_of_Fiji.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Gambian Dalasi",
            "code"=>"GMD",
            "symbol"=>"D",
            "country"=>"Gambia",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/7/77/Flag_of_The_Gambia.svg/35px-Flag_of_The_Gambia.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Georgian Lari",
            "code"=>"GEL",
            "symbol"=>"₾",
            "country"=>"Georgia",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/0/0f/Flag_of_Georgia.svg/35px-Flag_of_Georgia.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Ghanaian Cedi",
            "code"=>"GEL",
            "symbol"=>"¢",
            "country"=>"Ghana",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Flag_of_Ghana.svg/35px-Flag_of_Ghana.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Gibraltar Pound",
            "code"=>"GIP",
            "symbol"=>"£",
            "country"=>"Gibraltar",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/0/02/Flag_of_Gibraltar.svg/35px-Flag_of_Gibraltar.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Guatemalan Quetzal",
            "code"=>"GTQ",
            "symbol"=>"Q",
            "country"=>"Guatemala",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/0/02/Flag_of_Gibraltar.svg/35px-Flag_of_Gibraltar.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Guinean Franc",
            "code"=>"GNF",
            "symbol"=>"Fr",
            "country"=>"Guinea",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/e/ed/Flag_of_Guinea.svg/35px-Flag_of_Guinea.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Guyanese Dollar",
            "code"=>"GYD",
            "symbol"=>"gy",
            "country"=>"Guyana",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Flag_of_Guyana.svg/35px-Flag_of_Guyana.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Haitian Gourde",
            "code"=>"HTG",
            "symbol"=>"G",
            "country"=>"Haiti",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Flag_of_Haiti.svg/35px-Flag_of_Haiti.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Honduran Lempira",
            "code"=>"HNL",
            "symbol"=>"L",
            "country"=>"Honduras",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Flag_of_Honduras.svg/35px-Flag_of_Honduras.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Hong Kong Dollar",
            "code"=>"HKD",
            "symbol"=>"$",
            "country"=>"Hong Kong",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/5/5b/Flag_of_Hong_Kong.svg/35px-Flag_of_Hong_Kong.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Hungarian Forint",
            "code"=>"HUF",
            "symbol"=>"Ft",
            "country"=>"Hungary",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Flag_of_Hungary.svg/35px-Flag_of_Hungary.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Icelandic Króna",
            "code"=>"ISK",
            "symbol"=>"kr",
            "country"=>"Iceland",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/c/ce/Flag_of_Iceland.svg/32px-Flag_of_Iceland.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Indian Rupee",
            "code"=>"INR",
            "symbol"=>"₹",
            "country"=>"India",
            "flag"=>"https://upload.wikimedia.org/wikipedia/en/thumb/4/41/Flag_of_India.svg/35px-Flag_of_India.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Iranian Rial",
            "code"=>"IRR",
            "symbol"=>"﷼",
            "country"=>"Iran",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Flag_of_Iran.svg/35px-Flag_of_Iran.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Iraqi Dinar",
            "code"=>"IQD",
            "symbol"=>"Дин.",
            "country"=>"Iraq",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/f/f6/Flag_of_Iraq.svg/35px-Flag_of_Iraq.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Israeli New Shekel",
            "code"=>"ILS",
            "symbol"=>"₪",
            "country"=>"Israel",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Flag_of_Israel.svg/32px-Flag_of_Israel.svg.png"
        ]);

        DB::table('currencies')->insert([
            "name"=>"Jamaican Dollar",
            "code"=>"JMD",
            "symbol"=>"J$",
            "country"=>"Jamaica",
            "flag"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/0/0a/Flag_of_Jamaica.svg/35px-Flag_of_Jamaica.svg.png"
        ]);

    }
}

