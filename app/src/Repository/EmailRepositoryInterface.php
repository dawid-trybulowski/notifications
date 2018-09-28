<?php

namespace App\src\Repository;


use App\ValueObject\PositiveNumber;

interface EmailRepositoryInterface
{
    public function getEmailById(PositiveNumber $id);
}