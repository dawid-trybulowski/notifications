<?php

namespace App\src\Hydrator;

use App\src\Entity\EmailEntity;

/**
 * Interface EmailHydratorInterface
 * @package App\src\Hydrator
 */
interface EmailHydratorInterface
{

    /**
     * @param array $array
     * @return EmailEntity
     */
    public function hydrate(array $array);
}