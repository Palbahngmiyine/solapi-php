<?php

namespace Nurigo\Solapi\Models\Response;

use Nurigo\Solapi\Libraries\ResponseMapper;

class StatisticsMonthPeriod
{
    /**
     * @var string|null
     */
    public $date;

    /**
     * @var int|null
     */
    public $balance;

    /**
     * @var int|null
     */
    public $balanceAvg;

    /**
     * @var int|null
     */
    public $point;

    /**
     * @var int|null
     */
    public $pointAvg;

    /**
     * @var StatisticsDayPeriod[]|null
     */
    public $dayPeriod;

    /**
     * @var object[]|null
     */
    public $refund;

    /**
     * @var object|null
     */
    public $total;

    /**
     * @var object|null
     */
    public $successed;

    /**
     * @var object|null
     */
    public $failed;

    /**
     * @param \stdClass $value
     */
    public function __construct($value)
    {
        $this->date = $value->date ?? null;
        $this->balance = $value->balance ?? null;
        $this->balanceAvg = $value->balanceAvg ?? null;
        $this->point = $value->point ?? null;
        $this->pointAvg = $value->pointAvg ?? null;
        $this->refund = $value->refund ?? null;
        $this->total = $value->total ?? null;
        $this->successed = $value->successed ?? null;
        $this->failed = $value->failed ?? null;
        $this->dayPeriod = ResponseMapper::mapList($value->dayPeriod ?? null, StatisticsDayPeriod::class);
    }
}
