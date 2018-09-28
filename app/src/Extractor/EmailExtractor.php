<?php

namespace App\src\Extractor;


use App\src\Constant\EmailConstant;
use App\src\Entity\EmailEntity;
use App\src\Exception\ExtractorException;

/**
 * Class EmailExtractor
 * @package App\src\Extractor
 */
class EmailExtractor implements EmailExtractorInterface
{
    /**
     * @param EmailEntity $emailEntity
     * @return array
     * @throws ExtractorException
     */
    public function extract(EmailEntity $emailEntity): array
    {
        try {
            $array =
                [
                    EmailConstant::EMAIL_ID => $emailEntity->getId()->value(),
                    EmailConstant::EMAIL_THEME => $emailEntity->getTheme()->value(),
                    EmailConstant::EMAIL_TO => $emailEntity->getTo()->value(),
                    EmailConstant::EMAIL_FROM => $emailEntity->getFrom()->value(),
                    EmailConstant::EMAIL_CC => $emailEntity->getCc()->value(),
                    EmailConstant::EMAIL_BCC => $emailEntity->getBcc()->value(),
                    EmailConstant::EMAIL_CONTENT => $emailEntity->getContent()->value(),
                    EmailConstant::EMAIL_SIGNATURE => $emailEntity->getContent()->value(),
                    EmailConstant::EMAIL_TEMPLATE => $emailEntity->getTemplate()->value(),
                ];
            return $array;
        } catch (\Exception $exception) {
            throw new ExtractorException();
        }
    }
}