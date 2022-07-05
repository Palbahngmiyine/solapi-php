<?php

namespace Nurigo\Solapi\Models\kakao;

class KakaoOption
{
    public $pfId;
    public $templateId;
    public $variables = null;
    public $disableSms = false;
    public $adFlag = false;
    public $buttons = array();
    public $imageId;

    /**
     * @return string
     */
    public function getPfId(): string
    {
        return $this->pfId;
    }

    /**
     * @param string $pfId
     * @return KakaoOption
     */
    public function setPfId(string $pfId): KakaoOption
    {
        $this->pfId = $pfId;
        return $this;
    }

    /**
     * @return string
     */
    public function getTemplateId(): string
    {
        return $this->templateId;
    }

    /**
     * @param string $templateId
     * @return KakaoOption
     */
    public function setTemplateId(string $templateId): KakaoOption
    {
        $this->templateId = $templateId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVariables()
    {
        return $this->variables;
    }

    /**
     * @param mixed $variables
     * @return KakaoOption
     */
    public function setVariables($variables): KakaoOption
    {
        $this->variables = $variables;
        return $this;
    }

    /**
     * @return bool
     */
    public function getDisableSms(): bool
    {
        return $this->disableSms;
    }

    /**
     * @param bool $disableSms
     * @return KakaoOption
     */
    public function setDisableSms(bool $disableSms): KakaoOption
    {
        $this->disableSms = $disableSms;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAdFlag(): bool
    {
        return $this->adFlag;
    }

    /**
     * @param bool $adFlag
     * @return KakaoOption
     */
    public function setAdFlag(bool $adFlag): KakaoOption
    {
        $this->adFlag = $adFlag;
        return $this;
    }

    /**
     * @return array
     */
    public function getButtons(): array
    {
        return $this->buttons;
    }

    /**
     * @param array $buttons
     * @return KakaoOption
     */
    public function setButtons(array $buttons): KakaoOption
    {
        $this->buttons = $buttons;
        return $this;
    }

    /**
     * @return string
     */
    public function getImageId(): string
    {
        return $this->imageId;
    }

    /**
     * @param string $imageId
     * @return KakaoOption
     */
    public function setImageId(string $imageId): KakaoOption
    {
        $this->imageId = $imageId;
        return $this;
    }
}