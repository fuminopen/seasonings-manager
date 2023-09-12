<?php

namespace App\Exceptions\Models;

use Exception;

class InvalidRemainingException extends Exception
{
    public function __construct()
    {
        parent::__construct('残量は0 ~ 100の間で指定してください。');
    }
}
