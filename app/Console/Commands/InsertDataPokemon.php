<?php

namespace App\Console\Commands;

use App\Library\Services\Contracts\GoogleServiceInterface;
use Illuminate\Console\Command;

class InsertDataPokemon extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:insert-data-pokemon';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command insert data of pokemon to big query';

    /**
     * Execute the console command.
     */
    public function handle(GoogleServiceInterface $googleService)
    {
        $filePath = base_path() . '/pokemon-info.csv';
        $bigQuery = $googleService->authenticate();
        $googleService->insertData($bigQuery, $filePath);
    }
}
