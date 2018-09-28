<?php

namespace App\src\Service;

use App\src\Entity\EmailEntity;
use App\src\Extractor\EmailExtractorInterface;
use App\src\Hydrator\EmailHydratorInterface;
use App\src\Repository\EmailSendRepositoryInterface;
use App\src\Response\EmailSendResponse;

/**
 * Class EmailService
 * @package App\src\Service
 */
class EmailService implements EmailServiceInterface
{
    /**
     * @var EmailHydratorInterface
     */
    private $hydrator;
    /**
     * @var EmailSendRepositoryInterface
     */
    private $emailRepository;

    /**
     * EmailService constructor.
     * @param EmailHydratorInterface $hydrator
     * @param EmailSendRepositoryInterface $emailRepository
     */
    public function __construct(EmailHydratorInterface $hydrator, EmailSendRepositoryInterface $emailRepository)
    {
        $this->hydrator = $hydrator;
        $this->emailRepository = $emailRepository;
    }

    /**
     * @param EmailEntity $emailEntity
     * @return int
     */
    public function sendEmail(EmailEntity $emailEntity)
    {
        return $this->emailRepository->sendStandardEmail($emailEntity);
    }

    /**
     * @param $result
     * @return array
     */
    public function prepareHistory($result)
    {
        $array = [];
        foreach ($result as $row) {
            $element = $this->hydrator->hydrate((array)$row);
            $array[] = $element;
        }
        return $array;
    }
}