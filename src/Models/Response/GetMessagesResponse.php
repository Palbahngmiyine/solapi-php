<?php

namespace Nurigo\Solapi\Models\Response;

use Nurigo\Solapi\Libraries\ResponseMapper;

class GetMessagesResponse
{
    /**
     * @var int|null
     */
    public $limit;

    /**
     * @var object[]|null
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
