<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controller\ScrappingController;
use Goutte\Client;

class ImportTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:bd';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update from page Appliances Delivered';

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
     * @return mixed
     */
    public function handle()
    {
        $client = new Client();
        app('App\Http\Controllers\ScrappingController')->reading($client);
    }
}
