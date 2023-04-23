<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetPokemonData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-pokemon-data {offset=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get and save pokemon data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $fp = fopen('pokemon-info.csv', 'a');
        $offset = $this->argument('offset');

        for($i = $offset; $i <= $offset + 20; $i++) {
            $pokemonAppId = 'api/v2/pokemon/' . $i;
            $responsePoke = Http::get('https://pokeapi.co/' . $pokemonAppId);
            $pokemonDetail = $responsePoke->json();

            if (empty($pokemonDetail)) {
                continue;
            }

            $types = [];

            foreach ($pokemonDetail['types'] as $type) {
                $types[] = $type['type']['name'];
            }

            fputcsv($fp, [
                $pokemonDetail['name'],
                $pokemonAppId,
                $pokemonDetail['sprites']['front_shiny'],
                $pokemonDetail['weight'],
                join(', ', $types),
                $i,
            ]);
        }

        fclose($fp);
    }
}
