<?php

namespace Nurigo\Solapi\Models\Response;

use Nurigo\Solapi\Models\BaseMessage;
use Nurigo\Solapi\Models\Message;

class GetMessagesResponse
{
    /**
     * @var int|null
     */
    public $limit;

    /**
     * @var BaseMessage[]|null
     */
    public $messageList;

    /**
     * @var string|null
     */
    public $startKey;

    /**
     * @var string|null
     */
    public $nextKey;


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
