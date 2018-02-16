<?php

namespace App\Exceptions\Api;

use Exception;
use Throwable;

class CartNotFoundException extends Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct("Cart not found", 404, $previous);
    }

    public function report()
    {

    }

    public function render($request)
    {
        return response()->json(['message' => $this->message], $this->code);
    }
}
