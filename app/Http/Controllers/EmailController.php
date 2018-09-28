<?php

namespace App\Http\Controllers;

use App\src\Exception\PositiveNumberException;
use App\src\UseCase\EmailHistory;
use App\src\UseCase\EmailSend;
use App\src\UseCase\GetEmailFromHistory;
use App\src\Validator\EmailSendValidator;
use App\src\Validator\GetEmailFromHistoryValidator;
use App\ValueObject\PositiveNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

/**
 * Class EmailController
 * @package App\Http\Controllers
 */
class EmailController extends Controller
{
    /**
     * @var EmailSend
     */
    private $emailSend;
    /**
     * @var EmailHistory
     */
    private $emailHistory;
    /**
     * @var GetEmailFromHistory
     */
    private $getEmailFromHistory;

    /**
     * EmailController constructor.
     * @param EmailSend $emailSend
     * @param EmailHistory $emailHistory
     * @param GetEmailFromHistory $getEmailFromHistory
     */
    public function __construct(EmailSend $emailSend, EmailHistory $emailHistory, GetEmailFromHistory $getEmailFromHistory)
    {
        $this->emailSend = $emailSend;
        $this->emailHistory = $emailHistory;
        $this->getEmailFromHistory = $getEmailFromHistory;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(Request $request)
    {
        $request->validate(EmailSendValidator::RULES);
        $response = $this->emailSend->execute($request);
        return Redirect::back()->with('response', $response);
    }

    public function getEmailHistory(Request $request)
    {
        $response = $this->emailHistory->process();
        return view('Panel/history', compact('response'));
    }

    public function getEmailFromHistory(Request $request)
    {
        try {
            $id = new PositiveNumber($request->id);
        } catch (PositiveNumberException $e) {
            return view('Panel/index');
        }

        $response = $this->getEmailFromHistory->process($id);
        $email = $response->getData()[0];
        return view('Panel/send-email-from-history', compact('email'));
    }
}