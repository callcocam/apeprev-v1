<?php

namespace App\Services\Spout\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection as BaseCollection;

interface FilterInterface
{
    /**
     * @param Builder | BaseCollection $query
     */
    public static function query($query);

    /** 
     * 
    */
    public function setColumns(array $columns);

    /** 
     * 
     */
    public function setSearch(string $search);

    /** 
     * 
     */
    public function setFilters(array $filters);

    /** @return Builder */
    public function filter();
}