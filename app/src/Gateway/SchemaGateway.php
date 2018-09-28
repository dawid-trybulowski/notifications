<?php

namespace App\src\Gateway;


/**
 * Class SchemaGateway
 * @package App\src\Gateway
 */
class SchemaGateway extends AbstractGateway implements SchemaGatewayInterface
{
    const TABLE = 'n_schema';

    /**
     * @param $array
     * @param string $table
     * @return int
     * @throws \App\src\Exception\DatabaseInsertException
     */
    public function insert($array, $table = null)
    {
        return parent::insert($array, $table ?: EmailHistoryGateway::TABLE);
    }
}