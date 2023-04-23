<?php

namespace App\Library\Services\Contracts;

interface GoogleServiceInterface
{
    public function authenticate();

    public function insertData($bigQuery, $filePath);

    public function updateId($bigQuery);

    public function getPokemonList($bigQuery);

    public function getPokemonDetail($bigQuery, $id);
}
