<?php

namespace App\src\Gateway;


use App\src\Exception\DatabaseInsertException;
use App\src\Exception\DatabaseSelectException;
use Illuminate\Support\Facades\DB;

/**
 * Class AbstractGateway
 * @package App\src\Gateway
 */
class AbstractGateway
{
    /**
     * @param $array
     * @param $table
     * @return int
     * @throws DatabaseInsertException
     */
    public function insert($array, $table)
    {
        try {
            return DB::table($table)
                ->insertGetId
                (
                    $array
                );
        } catch (\Exception $exception) {
            throw new DatabaseInsertException();
        }
    }

    /**
     * @param $array
     * @param string $table
     * @return \Illuminate\Support\Collection
     * @throws DatabaseSelectException
     */
    public function selectAll($table = EmailHistoryGateway::TABLE)
    {
        try {
            return DB::table($table)
                ->get();
        } catch (\Exception $exception) {
            throw new DatabaseSelectException();
        }
    }

    public function select(array $params, $table = null)
    {
        try {
            $result = DB::table($table)->where([
                $params
            ])->get();
        } catch (\Exception $exception) {
            throw new DatabaseSelectException();
        }
        return $result;
    }
}