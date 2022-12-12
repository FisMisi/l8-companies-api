<?php

namespace App\Console\Commands;

use App\Imports\CompaniesImport;
use Illuminate\Console\Command;

class ImportCompanies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:companies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import companies from csv file.';

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
        $this->output->title('Starting import');
        (new CompaniesImport())
            ->withOutput($this->output)
            ->import(public_path('testCompanyDB.csv'));
        $this->output->success('Import successful');
    }
}
