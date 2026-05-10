<?php

namespace Nurigo\Solapi\Models\Response;

use Nurigo\Solapi\Libraries\ResponseMapper;

class GetStatisticsResponse
{
    /**
     * @var int|null
     */
    public $balance;

    /**
     * @var int|null
     */
    public $point;

    /**
     * @var int|null
     */
    public $monthlyBalanceAvg;

    /**
     * @var int|null
     */
    public $monthlyPointAvg;

    /**
     * @var StatisticsMonthPeriod[]|null
     */
    public $monthPeriod;

    /**
     * @var MessageType|null
     */
    public $total;

    /**
     * @param \stdClass $value
     */
    public function __construct($value)
    {
        $this->balance = $value->balance ?? null;
        $this->point = $value->point ?? null;
        $this->monthlyBalanceAvg = $value->monthlyBalanceAvg ?? null;
        $this->monthlyPointAvg = $value->monthlyPointAvg ?? null;
        $this->monthPeriod = ResponseMapper::mapList($value->monthPeriod ?? null, StatisticsMonthPeriod::class);
        $this->total = ResponseMapper::mapObject($value->total ?? null, MessageType::class);
    }
}
