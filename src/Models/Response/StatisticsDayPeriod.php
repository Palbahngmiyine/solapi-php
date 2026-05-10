<?php

namespace Nurigo\Solapi\Models\Response;

use Nurigo\Solapi\Libraries\ResponseMapper;

class StatisticsDayPeriod
{
    /**
     * @var string|null
     */
    public $month;

    /**
     * @var int|null
     */
    public $balance;

    /**
     * @var MessageType[]|null
     */
    public $statusCode;

    /**
     * @var object|null
     */
    public $refund;

    /**
     * @var MessageType|null
     */
    public $total;

    /**
     * @var MessageType|null
     */
    public $successed;

    /**
     * @var MessageType|null
     */
    public $failed;

    /**
     * @param \stdClass $value
     */
    public function __construct($value)
    {
        $this->month = $value->month ?? null;
        $this->balance = $value->balance ?? null;
        $this->refund = $value->refund ?? null;
        $this->statusCode = ResponseMapper::mapList($value->statusCode ?? null, MessageType::class);
        $this->total = ResponseMapper::mapObject($value->total ?? null, MessageType::class);
        $this->successed = ResponseMapper::mapObject($value->successed ?? null, MessageType::class);
        $this->failed = ResponseMapper::mapObject($value->failed ?? null, MessageType::class);
    }
}
