<?php

namespace App\src\UseCase;

use App\src\Command\AddEmailToHistoryCommand;
use App\src\Constant\ErrorsConstant;
use App\src\Constant\MessagesConstant;
use App\src\Exception\ClearStringException;
use App\src\Exception\DatabaseInsertException;
use App\src\Exception\EmailSendException;
use App\src\Exception\EmailValueObjectException;
use App\src\Exception\ExtractorException;
use App\src\Exception\PositiveNumberException;
use App\src\Mapper\EmailMapperInterface;
use App\src\Response\EmailSendResponse;
use App\src\Service\EmailServiceInterface;
use Illuminate\Http\Request;

/**
 * Class EmailSend
 * @package App\src\UseCase
 */
class EmailSend
{
    /**
     * @var EmailMapperInterface
     */
    private $emailMapper;
    /**
     * @var EmailServiceInterface
     */
    private $emailService;
    /**
     * @var EmailSendResponse
     */
    private $response;
    /**
     * @var AddEmailToHistoryCommand
     */
    private $addEmailToHistoryCommand;


    /**
     * EmailSend constructor.
     * @param EmailMapperInterface $emailMapper
     * @param EmailServiceInterface $emailService
     * @param EmailSendResponse $response
     */
    public function __construct(EmailMapperInterface $emailMapper, EmailServiceInterface $emailService, EmailSendResponse $response, AddEmailToHistoryCommand $addEmailToHistoryCommand)
    {
        $this->emailMapper = $emailMapper;
        $this->emailService = $emailService;
        $this->response = $response;
        $this->addEmailToHistoryCommand = $addEmailToHistoryCommand;
    }


    /**
     * @param Request $request
     * @return EmailSendResponse
     */
    public function execute(Request $request)
    {
        try {
            $emailEntity = $this->emailMapper->map($request->post());
            if ($this->emailService->sendEmail($emailEntity)) {
                $this->response->setIsSuccess(true);
                $this->response->setMessage(MessagesConstant::EMAIL_SEND_SUCCESS_DATABASE_ERROR);
                if ($this->addEmailToHistoryCommand->execute($emailEntity))
                    $this->response->setMessage(MessagesConstant::EMAIL_SEND_SUCCESS);
            } else {
                $this->response->setErrorCode(1);
                $this->response->setMessage(ErrorsConstant::EMAIL_ERRORS[1]);
            }
        } catch (ClearStringException $exception) {
            $this->response->setErrorCode(2);
            $this->response->setMessage(ErrorsConstant::EMAIL_ERRORS[2]);
        } catch (PositiveNumberException $exception) {
            $this->response->setErrorCode(2);
            $this->response->setMessage(ErrorsConstant::EMAIL_ERRORS[2]);
        } catch (EmailValueObjectException $exception) {
            $this->response->setErrorCode(2);
            $this->response->setMessage(ErrorsConstant::EMAIL_ERRORS[2]);
        } catch (EmailSendException $exception) {
            $this->response->setErrorCode(2);
            $this->response->setMessage(ErrorsConstant::EMAIL_ERRORS[2]);
        } catch (ExtractorException $exception) {
            $this->response->setMessage(MessagesConstant::EMAIL_SEND_SUCCESS_DATABASE_ERROR);
        } catch (DatabaseInsertException $exception) {
            $this->response->setMessage(MessagesConstant::EMAIL_SEND_SUCCESS_DATABASE_ERROR);
        } catch (\Exception $exception) {
            $this->response->setErrorCode(100);
            $this->response->setMessage(ErrorsConstant::EMAIL_ERRORS[100]);
        }
        return $this->response;
    }
}