<?php

namespace Nurigo\Solapi\Models\Response;

class GetBalanceResponse
{
    /**
     * @var float|null
     */
    public $point;

    /**
     * @var float|null
     */
    public $balance;

    /**
     * @param \stdClass $value
     */
    public function __construct($value)
    {
        $this->balance = $value->balance ?? null;
        $this->point = $value->point ?? null;
    }
}
