<?php

namespace App\src\Repository;


use App\src\Entity\EmailEntity;
use App\src\Response\EmailSendResponse;

/**
 * Interface EmailSendRepositoryInterface
 * @package App\src\Repository
 */
interface EmailSendRepositoryInterface
{
    /**
     * @param EmailEntity $emailEntity
     * @return bool
     */
    public function sendStandardEmail(EmailEntity $emailEntity);
}