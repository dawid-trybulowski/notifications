<?php

namespace App\src\Mapper;

use App\src\Entity\EmailEntity;

/**
 * Interface EmailMapperInterface
 * @package App\src\Mapper
 */
interface EmailMapperInterface
{
    /**
     * @param array $array
     * @return EmailEntity
     */
    public function map(array $array);
}