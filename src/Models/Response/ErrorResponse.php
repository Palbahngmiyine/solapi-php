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
     * @param \stdClass $value
     */
    public function __construct($value)
    {
        $this->errorCode = $value->errorCode;
        $this->errorMessage = $value->errorMessage;
    }

    public function jsonSerialize(): array
    {
        return [
            "errorCode" => $this->errorCode,
            "errorMessage" => $this->errorMessage
        ];
    }
}
