<?php

namespace App\Common\Exceptions;

use Exception;

class BadRequestException extends Exception
{
    /**
     * @var int
     */
    protected $code = 400;

    /**
     * @var string
     */
    protected $message = 'Bad Request';
}
