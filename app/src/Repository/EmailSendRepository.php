<?php

namespace App\src\Repository;

use App\src\Entity\EmailEntity;
use App\src\Gateway\EmailSendGatewayInterface;
use App\src\Response\EmailSendResponse;

class EmailSendRepository implements EmailSendRepositoryInterface
{
    /**
     * @var EmailSendGatewayInterface
     */
    private $emailGateway;
    /**
     * @var EmailSendResponse
     */
    private $response;

    /**
     * EmailSendRepository constructor.
     * @param EmailSendGatewayInterface $emailGateway
     * @param EmailSendResponse $response
     */
    public function __construct(EmailSendGatewayInterface $emailGateway, EmailSendResponse $response)
    {
        $this->emailGateway = $emailGateway;
        $this->response = $response;
    }

    /**
     * @param EmailEntity $emailEntity
     * @return bool
     */
    public function sendStandardEmail(EmailEntity $emailEntity)
    {
        return $this->emailGateway->send($emailEntity);
    }
}