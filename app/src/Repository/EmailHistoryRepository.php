<?php

namespace App\src\Repository;


use App\src\Constant\EmailConstant;
use App\src\Gateway\EmailHistoryGatewayInterface;
use App\ValueObject\PositiveNumber;

class EmailHistoryRepository implements EmailHistoryRepositoryInterface
{
    /**
     * @var EmailHistoryGatewayInterface
     */
    private $gateway;

    public function __construct(EmailHistoryGatewayInterface $gateway)
    {
        $this->gateway = $gateway;
    }

    public function insert(array $array)
    {
        return $this->gateway->insert($array);
    }

    public function selectAll()
    {
        return $this->gateway->selectAll();
    }

    public function getEmailById(PositiveNumber $id)
    {
        $array = [EmailConstant::EMAIL_ID, $id->value()];
        return $this->gateway->select($array);
    }
}