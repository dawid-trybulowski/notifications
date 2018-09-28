<?php

namespace App\src\Response;


/**
 * Class EmailSendResponse
 * @package App\src\Response
 */
class EmailSendResponse
{
    /**
     * @var int
     */
    public $id;
    /**
     * @var bool
     */
    public $isSuccess = false;
    /**
     * @var int
     */
    public $errorCode;
    /**
     * @var string
     */
    public $message;

    /**
     * @return bool
     */
    public function getIsSuccess()
    {
        return $this->isSuccess;
    }

    /**
     * @param bool $isSuccess
     */
    public function setIsSuccess($isSuccess): void
    {
        $this->isSuccess = $isSuccess;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @param int $errorCode
     */
    public function setErrorCode($errorCode): void
    {
        $this->errorCode = $errorCode;
    }
}