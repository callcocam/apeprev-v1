<?php

namespace App\Services\Spout\Helpers;

use Illuminate\Container\Container;
use Illuminate\Pagination\{LengthAwarePaginator, Paginator};
use Illuminate\Support\{Carbon, Collection as BaseCollection, Facades\Schema, Str};
use App\Services\Spout\Contracts\CollectionFilterInterface;

class Collection implements CollectionFilterInterface
{

     /**
     * @param BaseCollection $query
     * @return self
     */
    public static function query($query): self
    {
        /** @phpstan-ignore-next-line */
        return new static($query);
    }

   /**
     * @param array $columns
     * @return $this
     */
    public function setColumns(array $columns): self
    {
        $this->columns = $columns;

        return $this;
    }

     /**
     * @param string $search
     * @return $this
     */
    public function setSearch(string $search): self
    {
        $this->search = $search;

        return $this;
    }

 /**
     * @param array $filters
     * @return $this
     */
    public function setFilters(array $filters): self
    {
        $this->filters = $filters;

        return $this;
    }

    public function filter(): BaseCollection
    {
    }

}