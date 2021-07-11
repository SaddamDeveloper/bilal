<?php

namespace App\Console\Commands;

use App\Models\MidrateFx;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class WallexImportMidrate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wallex:import:midrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importing wallex midrate json file into midrate_fx table.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info("Truncating midrate_fxes table...");
        DB::table('midrate_fxes')->truncate();
        $this->info("Truncated midrate_fxes table successfully.");

        $json = File::get("database/data/exchange-midrate.json");
        $data = json_decode($json);

        $this->info("Importing data...");
        foreach ($data as $obj) {
            MidrateFx::create([
                'rate' => $obj->rate,
                'source' => $obj->source,
                'target' => $obj->target,
                'time' => $obj->time
            ]);
        }

        $this->info("Data imported successfully.");
    }
}
