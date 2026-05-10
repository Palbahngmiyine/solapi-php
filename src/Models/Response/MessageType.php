<?php

namespace Nurigo\Solapi\Models\Response;

class MessageType
{
    /**
     * @var int|null
     */
    public $total;

    /**
     * @var int|null
     */
    public $sms;

    /**
     * @var int|null
     */
    public $lms;

    /**
     * @var int|null
     */
    public $mms;

    /**
     * @var int|null
     */
    public $ata;

    /**
     * @var int|null
     */
    public $cta;

    /**
     * @var int|null
     */
    public $cti;

    /**
     * @var int|null
     */
    public $nsa;

    /**
     * @var int|null
     */
    public $rcs_sms;

    /**
     * @var int|null
     */
    public $rcs_lms;

    /**
     * @var int|null
     */
    public $rcs_mms;

    /**
     * @var int|null
     */
    public $rcs_tpl;

    /**
     * @param \stdClass $value
     */
    public function __construct($value)
    {
        $this->total = $value->total ?? null;
        $this->sms = $value->sms ?? null;
        $this->lms = $value->lms ?? null;
        $this->mms = $value->mms ?? null;
        $this->ata = $value->ata ?? null;
        $this->cta = $value->cta ?? null;
        $this->cti = $value->cti ?? null;
        $this->nsa = $value->nsa ?? null;
        $this->rcs_sms = $value->rcs_sms ?? null;
        $this->rcs_lms = $value->rcs_lms ?? null;
        $this->rcs_mms = $value->rcs_mms ?? null;
        $this->rcs_tpl = $value->rcs_tpl ?? null;
    }
}
