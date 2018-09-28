<?php

namespace App\src\Validator;


use App\src\Constant\SchemaConstant;

/**
 * Class NewSchemaValidator
 * @package App\src\Validator
 */
class NewSchemaValidator
{
    const RULES =
        [
            SchemaConstant::SCHEMA_THEME => 'required|string',
            SchemaConstant::SCHEMA_FROM => 'required|email',
            SchemaConstant::SCHEMA_TO => 'required|email',
            SchemaConstant::SCHEMA_CC => 'nullable|string',
            SchemaConstant::SCHEMA_BCC => 'nullable|string',
            SchemaConstant::SCHEMA_CONTENT => 'required|string',
            SchemaConstant::SCHEMA_SIGNATURE => 'required|string',
        ];
}