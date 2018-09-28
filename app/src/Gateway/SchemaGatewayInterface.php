<?php

namespace App\src\Gateway;


/**
 * Interface SchemaGatewayInterface
 * @package App\src\Gateway
 */
interface SchemaGatewayInterface
{
    /**
     * @param $array
     * @param null $table
     * @return int
     */
    public function insert($array, $table = null);
}