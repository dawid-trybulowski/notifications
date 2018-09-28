<?php

namespace App\src\Mapper;


use App\src\Constant\EmailConstant;
use App\src\Entity\EmailEntity;
use App\src\Extractor\EmailExtractorInterface;
use App\src\ValueObject\ClearString;
use App\src\ValueObject\Email;
use App\ValueObject\PositiveNumber;

/**
 * Class EmailMapper
 * @package App\src\Mapper
 */
class EmailMapper implements EmailMapperInterface
{
    /**
     * @param array $array
     * @return EmailEntity
     * @throws \App\src\Exception\ClearStringException
     * @throws \App\src\Exception\EmailValueObjectException
     * @throws \App\src\Exception\PositiveNumberException
     */
    public function map(array $array)
    {
        $entity = new EmailEntity();
        $entity->setTemplate(isset($array[EmailConstant::EMAIL_TEMPLATE]) ? new ClearString($array[EmailConstant::EMAIL_TEMPLATE]) : new ClearString('/Email/standard-email'));
        $entity->setId(isset($array[EmailConstant::EMAIL_ID]) ? new PositiveNumber($array[EmailConstant::EMAIL_ID]) : new PositiveNumber(0));
        $entity->setTo($array[EmailConstant::EMAIL_TO] ? new Email($array[EmailConstant::EMAIL_TO]) : new Email(''));
        $entity->setFrom($array[EmailConstant::EMAIL_FROM] ? new Email($array[EmailConstant::EMAIL_FROM]) : new Email(''));
        $entity->setTheme($array[EmailConstant::EMAIL_THEME] ? new ClearString($array[EmailConstant::EMAIL_THEME]) : new Email(''));
        $entity->setCc($array[EmailConstant::EMAIL_CC] ? new Email($array[EmailConstant::EMAIL_CC]) : new Email(''));
        $entity->setBcc($array[EmailConstant::EMAIL_BCC] ? new Email($array[EmailConstant::EMAIL_BCC]) : new Email(''));
        $entity->setContent($array[EmailConstant::EMAIL_CONTENT] ? new ClearString(nl2br($array[EmailConstant::EMAIL_CONTENT])) : new Email(''));
        $entity->setSignature($array[EmailConstant::EMAIL_SIGNATURE] ? new ClearString($array[EmailConstant::EMAIL_SIGNATURE]) : new Email(''));
        return $entity;
    }
}