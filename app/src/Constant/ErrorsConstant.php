<?php

namespace App\src\Constant;


class ErrorsConstant
{
    const EMAIL_ERRORS =
        [
            1 => 'Błąd wysyłki wiadomości e-mail',
            2 => 'Błędne parametry wywołania',
            3 => 'Błąd pobierania historii',
            4 => 'Błąd parsowania historii',
            5 => 'Historia jest pusta',
            100 => 'Błąd wewnętrzny',
        ];
}