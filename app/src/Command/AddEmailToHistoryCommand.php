<?php

namespace App\src\Command;


use App\src\Entity\EmailEntity;
use App\src\Extractor\EmailExtractorInterface;
use App\src\Repository\EmailHistoryRepositoryInterface;

/**
 * Class AddEmailToHistoryCommand
 * @package App\src\Command
 */
class AddEmailToHistoryCommand
{
    /**
     * @var EmailHistoryRepositoryInterface
     */
    private $repository;
    /**
     * @var EmailExtractorInterface
     */
    private $emailExtractor;

    /**
     * AddEmailToHistoryCommand constructor.
     * @param EmailHistoryRepositoryInterface $repository
     * @param EmailExtractorInterface $emailExtractor
     */
    public function __construct(EmailHistoryRepositoryInterface $repository, EmailExtractorInterface $emailExtractor)
    {
        $this->repository = $repository;
        $this->emailExtractor = $emailExtractor;
    }

    /**
     * @param EmailEntity $emailEntity
     * @return mixed
     */
    public function execute(EmailEntity $emailEntity)
    {
        $array = $this->emailExtractor->extract($emailEntity);
        return $this->repository->insert($array);
    }
}