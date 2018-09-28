<?php

namespace App\src\Gateway;

use App\src\Entity\EmailEntity;
use Illuminate\Support\Facades\Mail;

class EmailSendGateway implements EmailSendGatewayInterface
{
    /**
     * @param EmailEntity $emailEntity
     * @return bool
     */
    public function send(EmailEntity $emailEntity)
    {
        try {
            Mail::send($emailEntity->getTemplate()->value(), ['data' => ['email'=>$emailEntity]], function ($message) use ($emailEntity) {
                $message->sender($emailEntity->getFrom()->value());
                $message->to($emailEntity->getTo()->value());
                $message->from($emailEntity->getFrom()->value());
                $message->subject($emailEntity->getTheme()->value());
                if($emailEntity->getCc()->value())
                $message->cc($emailEntity->getCc()->value());
                if($emailEntity->getBcc()->value())
                $message->bcc($emailEntity->getBcc()->value());
            });
        } catch (\Exception $exception) {
            return false;
        }
        return true;
    }
}