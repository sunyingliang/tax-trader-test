<?php

namespace TT\Common;

use TT\Common\IO;

class TTHandler
{
    protected $responseArr;
    protected $data;

    public function __construct()
    {
        $this->responseArr = IO::initResponseArray();

        // Take POST as the default request method, can be overridden in specified method
        $this->data = IO::getPostParameters();
    }
}
