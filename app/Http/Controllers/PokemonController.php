<?php

namespace App\Http\Controllers;

use App\Library\Services\Contracts\GoogleServiceInterface;

class PokemonController
{
    public function getPokemonList(GoogleServiceInterface $googleService)
    {
        $bigQuery = $googleService->authenticate();
        return $googleService->getPokemonList($bigQuery);
    }

    public function getPokemonDetail(GoogleServiceInterface $googleService, $id)
    {
        $bigQuery = $googleService->authenticate();
        return $googleService->getPokemonDetail($bigQuery, $id);
    }
}
