<?php

declare(strict_types=1);

namespace Tapfiliate\Api\Exceptions;

use Exception;

class HttpException extends Exception
{
    /** @phpstan-ignore-next-line */
    private int $statusCode;

    public function __construct(int $statusCode, ?string $message = '', \Throwable $previous = null, ?int $code = 0)
    {
        $this->statusCode = $statusCode;
        parent::__construct($message, $code, $previous);
    }
}
