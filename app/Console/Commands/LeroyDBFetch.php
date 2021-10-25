<?php

namespace App\Console\Commands;

use App\Leroy\Reader\LeroyApi;
use App\Leroy\DeptSeeder;
use App\Leroy\ProductSeeder;
use Illuminate\Console\Command;

class LeroyDBFetch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'leroy:fetchdb';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed DB with Leroy data';

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
        $pReader = new LeroyApi();
        $pReader->setApiKey(config('app.leroy_api_key'));
        $pDeptSeeder = new DeptSeeder($pReader);
        $pDeptSeeder->process();
        \sleep(1);
        $pProdSeeder = new ProductSeeder($pReader);
        $pProdSeeder->process();
        return Command::SUCCESS;
    }
}
