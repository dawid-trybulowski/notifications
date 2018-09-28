<?php

namespace App\src\ValueObject;


use App\src\Exception\EmailValueObjectException;

class Email
{
    private $value;

    /**
     * Email constructor.
     * @param string $value
     * @throws EmailValueObjectException
     */
    public function __construct(string $value)
    {

        $this->value = $this->prepare($value);
        $this->value = $value;
    }

    /**
     * @param $value
     * @return string
     * @throws EmailValueObjectException
     */
    private function prepare($value): string
    {
        if (!filter_var($value, FILTER_SANITIZE_EMAIL) && $value !== '') {
            throw new EmailValueObjectException();
        }
        return filter_var($value, FILTER_SANITIZE_EMAIL);
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->value;
    }
}