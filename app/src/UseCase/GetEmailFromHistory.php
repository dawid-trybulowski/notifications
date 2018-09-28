<?php

namespace App\src\UseCase;


use App\src\Constant\ErrorsConstant;
use App\src\Constant\MessagesConstant;
use App\src\Exception\DatabaseSelectException;
use App\src\Repository\EmailHistoryRepositoryInterface;
use App\src\Response\EmailHistoryResponse;
use App\src\Service\EmailServiceInterface;
use App\ValueObject\PositiveNumber;

/**
 * Class GetEmailFromHistory
 * @package App\src\UseCase
 */
class GetEmailFromHistory
{
    /**
     * @var EmailHistoryRepositoryInterface
     */
    private $emailHistoryRepository;
    /**
     * @var EmailHistoryResponse
     */
    private $response;
    /**
     * @var EmailServiceInterface
     */
    private $service;

    /**
     * GetEmailFromHistory constructor.
     * @param EmailHistoryRepositoryInterface $emailHistoryRepository
     * @param EmailHistoryResponse $response
     * @param EmailServiceInterface $service
     */
    public function __construct(EmailHistoryRepositoryInterface $emailHistoryRepository, EmailHistoryResponse $response, EmailServiceInterface $service)
    {
        $this->emailHistoryRepository = $emailHistoryRepository;
        $this->response = $response;
        $this->service = $service;
    }

    /**
     * @param PositiveNumber $id
     * @return EmailHistoryResponse
     */
    public function process(PositiveNumber $id)
    {
        try {
            $result = $this->emailHistoryRepository->getEmailById($id);
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