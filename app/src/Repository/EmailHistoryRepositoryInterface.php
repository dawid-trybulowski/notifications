<?php

namespace App\src\Repository;


/**
 * Interface EmailHistoryRepositoryInterface
 * @package App\src\Repository
 */

use App\ValueObject\PositiveNumber;

/**
 * Interface EmailHistoryRepositoryInterface
 * @package App\src\Repository
 */
interface EmailHistoryRepositoryInterface
{
    /**
     * @param array $array
     * @return int
     */
    public function insert(array $array);

    /**
     * @return bool
     */
    public function selectAll();

    /**
     * @param PositiveNumber $id
     * @return mixed
     */
    public function getEmailById(PositiveNumber $id);
}