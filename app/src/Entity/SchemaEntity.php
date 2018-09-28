<?php

namespace App\src\Entity;


use App\src\ValueObject\ClearString;
use App\src\ValueObject\Email;
use App\ValueObject\PositiveNumber;

class SchemaEntity
{
    /**
     * @var PositiveNumber
     */
    protected $id;
    /**
     * @var Email
     */
    protected $to;
    /**
     * @var Email
     */
    protected $from;
    /**
     * @var Email
     */
    protected $cc;
    /**
     * @var Email
     */
    protected $bcc;
    /**
     * @var ClearString
     */
    protected $theme;
    /**
     * @var ClearString
     */
    protected $content;
    /**
     * @var ClearString
     */
    protected $template;
    /**
     * @var ClearString
     */
    protected $signature;

    /**
     * @return PositiveNumber
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param PositiveNumber $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return Email
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param Email $to
     */
    public function setTo($to): void
    {
        $this->to = $to;
    }

    /**
     * @return Email
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param Email $from
     */
    public function setFrom($from): void
    {
        $this->from = $from;
    }

    /**
     * @return Email
     */
    public function getCc()
    {
        return $this->cc;
    }

    /**
     * @param Email $dc
     */
    public function setCc($cc): void
    {
        $this->cc = $cc;
    }

    /**
     * @return Email
     */
    public function getBcc()
    {
        return $this->bcc;
    }

    /**
     * @param Email $dcc
     */
    public function setBcc($bcc): void
    {
        $this->bcc = $bcc;
    }

    /**
     * @return ClearString
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * @param ClearString $theme
     */
    public function setTheme($theme): void
    {
        $this->theme = $theme;
    }

    /**
     * @return ClearString
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param ClearString $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @return ClearString
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param ClearString $template
     */
    public function setTemplate($template): void
    {
        $this->template = $template;
    }

    /**
     * @return ClearString
     */
    public function getSignature(): ClearString
    {
        return $this->signature;
    }

    /**
     * @param ClearString $signature
     */
    public function setSignature(ClearString $signature): void
    {
        $this->signature = $signature;
    }
}