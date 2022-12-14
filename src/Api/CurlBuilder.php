<?php

declare(strict_types=1);

namespace Tapfiliate\Api;

use const CURLOPT_CUSTOMREQUEST;
use const CURLOPT_FAILONERROR;
use const CURLOPT_HTTPHEADER;
use const CURLOPT_POSTFIELDS;
use const CURLOPT_RETURNTRANSFER;
use const CURLOPT_SSL_VERIFYPEER;
use const CURLOPT_URL;

class CurlBuilder
{
    private array $options;

    public function __construct()
    {
        $this->options = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FAILONERROR => true,
            CURLOPT_SSL_VERIFYPEER => false,
        ];
    }

    public function setMethod(string $method): CurlBuilder
    {
        $this->options[CURLOPT_CUSTOMREQUEST] = $method;

        return $this;
    }

    public function setUrl(string $url): CurlBuilder
    {
        $this->options[CURLOPT_URL] = $url;

        return $this;
    }

    public function setHeaders(array $headers): CurlBuilder
    {
        $this->options[CURLOPT_HTTPHEADER] = $headers;

        return $this;
    }

    public function setBody(string $body): CurlBuilder
    {
        $this->options[CURLOPT_POSTFIELDS] = $body;

        return $this;
    }

    public function toArray(): array
    {
        return $this->options;
    }
}
