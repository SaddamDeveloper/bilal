<?php

namespace Database\Seeders;

use App\Models\MidrateFx;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MidrateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return string
     */
    public function run()
    {
        DB::table('midrate_fxes')->delete();
        $json = File::get("database/data/exchange-midrate.json");
        $data = json_decode($json);

        foreach ($data as $obj) {
            MidrateFx::create([
                'rate' => $obj->rate,
                'source' => $obj->source,
                'target' => $obj->target,
                'time' => $obj->time
            ]);
        }
        return "data updated successfully";
    }
}
