<?php

namespace Nurigo\Solapi\Models\Response;

use JsonSerializable;
use Nurigo\Solapi\Libraries\ResponseMapper;

class SendResponse implements JsonSerializable
{
    /**
     * @var GroupMessageResponse|null
     */
    public $groupInfo;

    /**
     * @var FailedMessage[]|null
     */
    public $failedMessageList;

    /**
     * @param \stdClass|null $value
     */
    public function __construct($value = null)
    {
        $this->groupInfo = ResponseMapper::mapObject($value->groupInfo ?? null, GroupMessageResponse::class);
        $this->failedMessageList = ResponseMapper::mapList($value->failedMessageList ?? null, FailedMessage::class) ?? [];
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            "groupInfo" => $this->groupInfo,
            "failedMessageList" => $this->failedMessageList
        ];
    }
}
