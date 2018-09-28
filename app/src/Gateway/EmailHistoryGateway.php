<?php

namespace App\src\Gateway;


/**
 * Class EmailHistoryGateway
 * @package App\src\Gateway
 */
/**
 * Class EmailHistoryGateway
 * @package App\src\Gateway
 */
/**
 * Class EmailHistoryGateway
 * @package App\src\Gateway
 */
class EmailHistoryGateway extends AbstractGateway implements EmailHistoryGatewayInterface
{
    const TABLE = 'n_history';

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

    /**
     * @param null $table
     * @return \Illuminate\Support\Collection
     * @throws \App\src\Exception\DatabaseSelectException
     */
    public function selectAll($table = null)
    {
        return parent::selectAll($table ?: EmailHistoryGateway::TABLE);
    }

    /**
     * @param array $params
     * @param null $table
     * @return \Illuminate\Support\Collection
     * @throws \App\src\Exception\DatabaseSelectException
     */
    public function select(array $params, $table = null)
    {;
        return parent::select($params, $table ?: EmailHistoryGateway::TABLE);
    }
}