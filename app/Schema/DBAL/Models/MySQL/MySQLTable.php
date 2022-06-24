<?php

namespace App\Schema\DBAL\Models\MySQL;

use Doctrine\DBAL\Schema\Column as DoctrineDBALColumn;
use Doctrine\DBAL\Schema\Index as DoctrineDBALIndex;
use App\Schema\DBAL\Models\DBALTable;
use App\Schema\Models\Column;
use App\Schema\Models\Index;

class MySQLTable extends DBALTable
{
    /**
     * @inheritDoc
     */
    protected function handle(): void
    {
    }

    /**
     * @inheritDoc
     */
    protected function makeColumn(string $table, DoctrineDBALColumn $column): Column
    {
        return new MySQLColumn($table, $column);
    }

    /**
     * @inheritDoc
     */
    protected function makeIndex(string $table, DoctrineDBALIndex $index): Index
    {
        return new MySQLIndex($table, $index);
    }
}