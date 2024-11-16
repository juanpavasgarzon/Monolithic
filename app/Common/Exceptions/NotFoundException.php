<?php

namespace App\Common\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    /**
     * @var int
     */
    protected $code = 404;

    /**
     * @var string
     */
    protected $message = 'Not Found';
}
