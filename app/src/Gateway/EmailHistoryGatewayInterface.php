<?php

namespace App\src\Gateway;

interface EmailHistoryGatewayInterface
{
    public function insert($array, $table = null);

    public function selectAll($table = null);

    public function select(array $array, $table = null);
}