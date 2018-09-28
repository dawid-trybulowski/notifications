<?php

namespace App\src\Service;


use App\src\Entity\EmailEntity;
use App\src\Response\EmailSendResponse;

/**
 * Interface EmailServiceInterface
 * @package App\src\Service
 */
interface EmailServiceInterface
{
    /**
     * @param EmailEntity $emailEntity
     * @return int
     */
    public function sendEmail(EmailEntity $emailEntity);

    /**
     * @param $result
     * @return array
     */
    public function prepareHistory($result);
}