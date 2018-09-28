<?php

namespace App\src\Validator;


use App\src\Constant\EmailConstant;

/**
 * Class EmailSendValidator
 * @package App\src\Validator
 */
class EmailSendValidator
{
    const RULES =
        [
            EmailConstant::EMAIL_THEME => 'required|string',
            EmailConstant::EMAIL_FROM => 'required|email',
            EmailConstant::EMAIL_TO => 'required|email',
            EmailConstant::EMAIL_CC => 'nullable|string',
            EmailConstant::EMAIL_BCC => 'nullable|string',
            EmailConstant::EMAIL_CONTENT => 'required|string',
            EmailConstant::EMAIL_SIGNATURE => 'required|string',
        ];
}