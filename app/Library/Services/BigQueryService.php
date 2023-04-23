<?php

namespace App\Library\Services;

use App\Library\Services\Contracts\GoogleServiceInterface;
use Google\Cloud\BigQuery\BigQueryClient;

class BigQueryService implements GoogleServiceInterface
{
    public function authenticate()
    {
        return new BigQueryClient([
            'keyFilePath' => base_path() . '/abiding-envoy-262606-62b6e5605444.json',
        ]);
    }

    public function insertData($bigQuery, $filePath)
    {
        $dataset = $bigQuery->dataset('pokemon');
        $table = $dataset->table('pokemon');

        $loadJobConfig = $table->load(
            fopen($filePath, 'r')
        );

        $table->runJob($loadJobConfig);
    }

    public function updateId($bigQuery)
    {
        $queryJobConfig = $bigQuery->query(
            'SELECT * FROM `abiding-envoy-262606.pokemon.pokemon` WHERE id IS NULL;'
        );
    }

    public function getPokemonList($bigQuery)
    {
        $queryJobConfig = $bigQuery->query(
            'SELECT id, name FROM `abiding-envoy-262606.pokemon.pokemon` ORDER BY id ASC LIMIT 20;'
        );

        $queryResults = $bigQuery->runQuery($queryJobConfig);
        $pokemons = [];

        foreach ($queryResults as $row) {
            $pokemons[] = [
              'name' => $row['name'],
              'id' => $row['id'],
            ];
        }

        return $pokemons;
    }

    public function getPokemonDetail($bigQuery, $id)
    {
        $queryJobConfig = $bigQuery->query(
            "SELECT * FROM `abiding-envoy-262606.pokemon.pokemon` WHERE id = {$id};"
        );

        $queryResults = $bigQuery->runQuery($queryJobConfig);
        $pokemons = [];

        foreach ($queryResults as $row) {
            $pokemons[] = $row;
        }

        return $pokemons;
    }
}
