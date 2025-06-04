<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class NotFoundException extends Exception
{
    protected $message;

    public function __construct(string $message = 'Resultado não encontrado!', int $statusCode = Response::HTTP_CONFLICT)
    {
        parent::__construct($message, $statusCode);
    }

}
