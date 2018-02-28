<?php

namespace TT\Common\Exception;

class InvalidParameterException extends TTException
{
    public function __construct($message, $code = 100, $type = 0)
    {
        parent::__construct($message, $code, $type);
    }
}
