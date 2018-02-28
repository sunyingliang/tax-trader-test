<?php

namespace TT\IntegerCalculator\Handler;

use TT\Common\Exception\InvalidParameterException;
use TT\Common\IO;
use TT\Common\TTHandler;
use TT\IntegerCalculator\Entity\Integer;

class IntegerHandler extends TTHandler
{
    #region Methods
    public function calculate()
    {
        if (!($validation = IO::required($this->data, ['value', 'type']))['valid']) {
            throw new InvalidParameterException($validation['message']);
        }

        $integer = new Integer($this->data['value'], $this->data['type']);

        $this->responseArr['data'] = [
            'value' => $this->sumDigits($integer->getValue(), $integer->getType())
        ];

        return $this->responseArr;
    }
    #endregion

    #region Utils
    private function sumDigits($value, $type)
    {
        //throw new InvalidParameterException($value . '|' . $type);

        if ($type == 'sum') {
            return $value * ($value + 1) / 2;
        }

        $retValue = 0;
        $value    = strval($value);
        $length   = strlen($value);

        $i = 0;

        if ($type == 'even') {
            $i = 1;
        }

        while ($i < $length) {
            $retValue += $value[$i];
            $i += 2;
        }

        return $retValue;
    }
    #endregion
}
