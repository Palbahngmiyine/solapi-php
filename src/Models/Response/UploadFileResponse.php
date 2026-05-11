<?php

namespace Nurigo\Solapi\Models\Response;

class UploadFileResponse
{
    /**
     * @var string|null
     */
    public $type;

    /**
     * @var string|null
     */
    public $originalName;

    /**
     * @var string|null
     */
    public $link;

    /**
     * @var string|null
     */
    public $fileId;

    /**
     * @var string|null
     */
    public $name;

    /**
     * @var string|null
     */
    public $url;

    /**
     * @var string|null
     */
    public $accountId;

    /**
     * @var string|null
     */
    public $dateCreated;

    /**
     * @var string|null
     */
    public $dateUpdated;

    /**
     * @param \stdClass|null $value
     */
    public function __construct($value = null)
    {
        $this->type = $value->type ?? null;
        $this->originalName = $value->originalName ?? null;
        $this->link = $value->link ?? null;
        $this->fileId = $value->fileId ?? null;
        $this->name = $value->name ?? null;
        $this->url = $value->url ?? null;
        $this->accountId = $value->accountId ?? null;
        $this->dateCreated = $value->dateCreated ?? null;
        $this->dateUpdated = $value->dateUpdated ?? null;
    }
}
