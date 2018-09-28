<?php

namespace App\src\UseCase;


use App\src\Constant\ErrorsConstant;
use App\src\Constant\MessagesConstant;
use App\src\Exception\DatabaseSelectException;
use App\src\Repository\EmailHistoryRepositoryInterface;
use App\src\Response\EmailHistoryResponse;
use App\src\Service\EmailServiceInterface;

/**
 * Class EmailHistory
 * @package App\src\UseCase
 */
class EmailHistory
{
    /**
     * @var EmailHistoryRepositoryInterface
     */
    private $emailHistoryRepository;
    /**
     * @var EmailServiceInterface
     */
    private $service;
    /**
     * @var EmailHistoryResponse
     */
    private $response;

    /**
     * EmailHistory constructor.
     * @param EmailHistoryRepositoryInterface $emailHistoryRepository
     * @param EmailServiceInterface $service
     * @param EmailHistoryResponse $response
     */
    public function __construct(EmailHistoryRepositoryInterface $emailHistoryRepository, EmailServiceInterface $service, EmailHistoryResponse $response)
    {
        $this->emailHistoryRepository = $emailHistoryRepository;
        $this->service = $service;
        $this->response = $response;
    }


    public function process()
    {
        try {
            $result = $this->emailHistoryRepository->selectAll();
        } catch (DatabaseSelectException $exception) {
            $this->response->setErrorCode(3);
            $this->response->setMessage(ErrorsConstant::EMAIL_ERRORS[3]);
            return $this->response;
        } catch (\Exception $exception) {
            $this->response->setErrorCode(3);
            $this->response->setMessage(ErrorsConstant::EMAIL_ERRORS[3]);
            return $this->response;
        }
        try {
            $history = $this->service->prepareHistory($result);
            $this->response->setData($history);
            $this->response->setMessage(MessagesConstant::HISTORY_SELECT_SUCCESS);
            $this->response->setIsSuccess(true);
        } catch (\Exception $exception) {
            $this->response->setErrorCode(100);
            $this->response->setMessage(ErrorsConstant::EMAIL_ERRORS[100] . '; ' . ErrorsConstant::EMAIL_ERRORS[4]);
        }
        return $this->response;
    }
}