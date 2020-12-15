<?php

namespace App\Console\Commands;

use App\Http\Repository\Wallet;
use App\transactions;
use Illuminate\Console\Command;
use DB;


class CronCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CronCommand:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'User Name Change Successfully';

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
    Wallet::putDeposite();
    }
}
