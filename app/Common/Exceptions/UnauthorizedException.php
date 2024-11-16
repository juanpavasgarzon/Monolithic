<?php

namespace App\Common\Exceptions;

use Exception;

class UnauthorizedException extends Exception
{
    /**
     * @var int
     */
    protected $code = 401;

    /**
     * @var string
     */
    protected $message = 'Unauthorized';
}
