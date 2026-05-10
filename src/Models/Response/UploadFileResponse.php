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
     * @param \stdClass $value
     */
    public function __construct($value)
    {
        $this->type = $value->type;
        $this->originalName = $value->originalName;
        $this->link = $value->link;
        $this->fileId = $value->fileId;
        $this->name = $value->name;
        $this->url = $value->url;
        $this->accountId = $value->accountId;
        $this->dateCreated = $value->dateCreated;
        $this->dateUpdated = $value->dateUpdated;
    }
}
