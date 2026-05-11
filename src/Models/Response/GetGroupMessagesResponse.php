<?php

namespace Nurigo\Solapi\Models\Response;

use Nurigo\Solapi\Libraries\ResponseMapper;

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
     * @var object[]|null
     */
    public $messageList;

    /**
     * @param \stdClass|null $value
     */
    public function __construct($value = null)
    {
        $this->limit = $value->limit ?? null;
        $this->messageList = ResponseMapper::normalizeList($value->messageList ?? null);
        $this->startKey = $value->startKey ?? null;
        $this->nextKey = $value->nextKey ?? null;
    }
}
