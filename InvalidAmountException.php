<?php

declare(strict_types=1);

class InvalidAmountException extends Exception
{
    public function __construct(string $message = "Недопустимая сумма", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
