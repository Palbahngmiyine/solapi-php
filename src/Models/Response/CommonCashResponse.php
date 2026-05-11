<?php

namespace Nurigo\Solapi\Models\Response;

class CommonCashResponse
{
    /**
     * @var int|null
     */
    public $requested;

    /**
     * @var int|null
     */
    public $replacement;

    /**
     * @var int|null
     */
    public $refund;

    /**
     * @var int|null
     */
    public $sum;

    /**
     * @param \stdClass|null $value
     */
    public function __construct($value = null)
    {
        $this->requested = $value->requested ?? null;
        $this->replacement = $value->replacement ?? null;
        $this->refund = $value->refund ?? null;
        $this->sum = $value->sum ?? null;
    }
}
