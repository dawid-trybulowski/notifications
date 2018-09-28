<?php

namespace App\src\Gateway;


use App\src\Entity\EmailEntity;

/**
 * Interface EmailSendGatewayInterface
 * @package App\src\Gateway
 */
interface EmailSendGatewayInterface
{
    /**
     * @param EmailEntity $emailEntity
     * @return bool
     */
    public function send(EmailEntity $emailEntity);
}