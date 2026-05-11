<?php

namespace Nurigo\Solapi\Models\Response;

use JsonSerializable;

class ErrorResponse implements JsonSerializable
{
    /**
     * @var string|null
     */
    public $errorCode;

    /**
     * @var string|null
     */
    public $errorMessage;

    /**
     * @param \stdClass|null $value
     */
    public function __construct($value = null)
    {
        $this->errorCode = $value->errorCode ?? null;
        $this->errorMessage = $value->errorMessage ?? null;
    }

    public function jsonSerialize(): array
    {
        return [
            "errorCode" => $this->errorCode,
            "errorMessage" => $this->errorMessage
        ];
    }
}
