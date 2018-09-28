<?php

namespace App\src\ValueObject;


use App\src\Exception\ClearStringException;

/**
 * Class ClearString
 * @package App\src\ValueObject
 */
class ClearString
{
    /**
     * @var
     */
    private $value;

    /**
     * ClearString constructor.
     * @param $value
     * @throws ClearStringException
     */
    public function __construct($value)
    {

        $this->value = $this->prepare($value);
        $this->value = $value;
    }

    /**
     * @param $value
     * @return string
     * @throws ClearStringException
     */
    private function prepare($value)
    {
        if ($value === '' || $value === null) {
            return $value;
        }

        if (!filter_var($value, FILTER_SANITIZE_STRING)) {
            throw new ClearStringException;
        }
        return filter_var($value, FILTER_SANITIZE_STRING);
    }

    /**
     * @return string
     */
    public function value()
    {
        return $this->value;
    }
}