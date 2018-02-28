<?php

namespace TT\IntegerCalculator\Entity;

use TT\Common\Exception\InvalidParameterException;

class Integer
{
    #region Fields
    protected $value;
    protected $type;
    #endregion

    #region Construct
    public function __construct($value, $type = 'sum')
    {
        $this->setValue($value);
        $this->setType($type);
    }
    #endregion

    #region Getters & Setters
    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $message = 'Passed in parameter {value} must be positive integer';

        if (!is_numeric($value)) {
            throw new InvalidParameterException($message);
        }

        $value += 0;

        if (!is_int($value) || $value <= 0) {
            throw new InvalidParameterException($message);
        }

        $this->value = $value;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $typeArr = ['odd', 'even', 'sum'];
        $message = 'Allowed types are as follows: ' . implode($typeArr);

        if (!in_array(strtolower($type), $typeArr)) {
            throw new InvalidParameterException($message);
        }

        $this->type = strtolower($type);
    }
    #endregion
}
