<?php

namespace App\src\Mapper;

use App\src\Constant\SchemaConstant;
use App\src\Entity\SchemaEntity;
use App\src\ValueObject\ClearString;
use App\src\ValueObject\Email;
use App\ValueObject\PositiveNumber;

class SchemaMapper implements SchemaMapperInterface
{
    public function map(array $array)
    {
        $entity = new SchemaEntity();
        $entity->setTemplate(isset($array[SchemaConstant::SCHEMA_TEMPLATE]) ? new ClearString($array[SchemaConstant::SCHEMA_TEMPLATE]) : new ClearString('/Email/standard-email'));
        $entity->setId(isset($array[SchemaConstant::SCHEMA_ID]) ? new PositiveNumber($array[SchemaConstant::SCHEMA_ID]) : new PositiveNumber(0));
        $entity->setTo($array[SchemaConstant::SCHEMA_TO] ? new Email($array[SchemaConstant::SCHEMA_TO]) : new Email(''));
        $entity->setFrom($array[SchemaConstant::SCHEMA_FROM] ? new Email($array[SchemaConstant::SCHEMA_FROM]) : new Email(''));
        $entity->setTheme($array[SchemaConstant::SCHEMA_THEME] ? new ClearString($array[SchemaConstant::SCHEMA_THEME]) : new Email(''));
        $entity->setCc($array[SchemaConstant::SCHEMA_CC] ? new Email($array[SchemaConstant::SCHEMA_CC]) : new Email(''));
        $entity->setBcc($array[SchemaConstant::SCHEMA_BCC] ? new Email($array[SchemaConstant::SCHEMA_BCC]) : new Email(''));
        $entity->setContent($array[SchemaConstant::SCHEMA_CONTENT] ? new ClearString(nl2br($array[SchemaConstant::SCHEMA_CONTENT])) : new Email(''));
        $entity->setSignature($array[SchemaConstant::SCHEMA_SIGNATURE] ? new ClearString($array[SchemaConstant::SCHEMA_SIGNATURE]) : new Email(''));
        return $entity;
    }
}