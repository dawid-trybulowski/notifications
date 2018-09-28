<?php

namespace App\ValueObject;


use App\src\Exception\PositiveNumberException;

/**
 * Class PositiveNumber
 * @package App\ValueObject
 */
class PositiveNumber
{
    /**
     * @var int
     */
    private $value;

    /**
     * PositiveNumber constructor.
     * @param $value
     * @throws PositiveNumberException
     */
    public function __construct($value)
    {

        $this->value = $this->prepare($value);
    }

    /**
     * @param $value
     * @return int
     * @throws PositiveNumberException
     */
    private function prepare($value)
    {
        if (!is_numeric($value) && !$value > 0) {
            throw new PositiveNumberException;
        }
        return (int)$value;
    }

    /**
     * @return int
     */
    public function value()
    {
        return $this->value;
    }
}