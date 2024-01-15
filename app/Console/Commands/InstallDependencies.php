<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallDependencies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    /**
     * Execute the console command.
     */

    protected $signature = 'dependencies:install';
    protected $description = 'Install Node.js dependencies';

    public function handle()
    {
        $this->info('Installing Node.js dependencies...');
        exec('npm install');
        $this->info('Node.js dependencies installed successfully.');
    }
}
