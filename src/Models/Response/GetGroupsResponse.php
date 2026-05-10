<?php

namespace Nurigo\Solapi\Models\Response;

use Nurigo\Solapi\Libraries\ResponseMapper;

class GetGroupsResponse
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
     * @var GroupMessageResponse[]|null
     */
    public $groupList;

    /**
     * @param \stdClass $value
     */
    public function __construct($value)
    {
        $this->limit = $value->limit ?? null;
        $this->startKey = $value->startKey ?? null;
        $this->nextKey = $value->nextKey ?? null;
        $this->groupList = ResponseMapper::mapList($value->groupList ?? null, GroupMessageResponse::class);
    }
}
