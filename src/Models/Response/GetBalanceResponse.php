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
     * @param \stdClass|null $value
     */
    public function __construct($value = null)
    {
        $this->balance = $value->balance ?? null;
        $this->point = $value->point ?? null;
    }
}
