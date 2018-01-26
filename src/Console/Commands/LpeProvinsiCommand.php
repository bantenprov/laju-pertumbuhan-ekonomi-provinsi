<?php namespace Bantenprov\LpeProvinsi\Console\Commands;

use Illuminate\Console\Command;

/**
 * The LpeProvinsiCommand class.
 *
 * @package Bantenprov\LpeProvinsi
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class LpeProvinsiCommand extends Command
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
    protected $description = 'Demo command for Bantenprov\LpeProvinsi package';

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
        $this->info('Welcome to command for Bantenprov\LpeProvinsi package');
    }
}
