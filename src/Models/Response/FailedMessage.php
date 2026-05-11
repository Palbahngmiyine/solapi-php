<?php

namespace Nurigo\Solapi\Models\Response;

class FailedMessage
{
    /**
     * @var string|null
     */
    public $to;

    /**
     * @var string|null
     */
    public $from;

    /**
     * @var string|null
     */
    public $type;

    /**
     * @var string|null
     */
    public $statusMessage;

    /**
     * @var string|null
     */
    public $country;

    /**
     * @var string|null
     */
    public $messageId;

    /**
     * @var string|null
     */
    public $statusCode;

    /**
     * @var string|null
     */
    public $accountId;

    /**
     * @param \stdClass|null $value
     */
    public function __construct($value = null)
    {
        $this->to = $value->to ?? null;
        $this->from = $value->from ?? null;
        $this->type = $value->type ?? null;
        $this->statusMessage = $value->statusMessage ?? null;
        $this->country = $value->country ?? null;
        $this->messageId = $value->messageId ?? null;
        $this->statusCode = $value->statusCode ?? null;
        $this->accountId = $value->accountId ?? null;
    }
}
