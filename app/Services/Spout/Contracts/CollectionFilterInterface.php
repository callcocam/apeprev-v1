<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Services\Spout\Contracts;

use Illuminate\Support\Collection as BaseCollection;
use App\Services\Spout\Helpers\Collection;

interface CollectionFilterInterface
{
    public static function query(BaseCollection $query): Collection;

    /**
     * @param array $columns
     */
    public function setColumns(array $columns): Collection;

    public function setSearch(string $search): Collection;

    /**
     * @param array<string, array<string>> $filters
     */
    public function setFilters(array $filters): Collection;

    public function filter(): BaseCollection;
}