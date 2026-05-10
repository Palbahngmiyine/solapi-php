<?php

namespace Nurigo\Solapi\Models\Response;

use Nurigo\Solapi\Models\BaseMessage;

class GetGroupMessagesResponse
{
    /**
     * @var string|null
     */
    public $startKey;

    /**
     * @var string|null
     */
    public $nextKey;

    /**
     * @var int|null
     */
    public $limit;

    /**
     * @var BaseMessage[]|null
     */
    public $messageList;

    /**
     * @param \stdClass $value
     */
    public function __construct($value)
    {
        $this->limit = $value->limit ?? null;
        $this->messageList = $value->messageList ?? null;
        $this->startKey = $value->startKey ?? null;
        $this->nextKey = $value->nextKey ?? null;
    }
}
