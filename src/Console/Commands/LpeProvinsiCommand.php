<?php namespace Bantenprov\LpePprovinsi\Console\Commands;

use Illuminate\Console\Command;

/**
 * The LpePprovinsiCommand class.
 *
 * @package Bantenprov\LpePprovinsi
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class LpePprovinsiCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bantenprov:lpe-provinsi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Bantenprov\LpePprovinsi package';

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
        $this->info('Welcome to command for Bantenprov\LpePprovinsi package');
    }
}
