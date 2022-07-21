<?php

namespace App\Schema\DBAL\Models\MySQL;

use Doctrine\DBAL\Schema\View as DoctrineDBALView;
use App\Schema\DBAL\Models\DBALView;

class MySQLView extends DBALView
{
    /**
     * @inheritDoc
     * @throws \Doctrine\DBAL\Exception
     */
    protected function handle(DoctrineDBALView $view): void
    {
        $this->createViewSQL = $this->makeCreateViewSQL($this->quotedName, $view->getSql());
    }
}