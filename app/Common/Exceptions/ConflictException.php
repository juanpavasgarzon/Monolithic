<?php

namespace App\Common\Exceptions;

use Exception;

class ConflictException extends Exception
{
    /**
     * @var int
     */
    protected $code = 409;

    /**
     * @var string
     */
    protected $message = 'Conflict';
}
