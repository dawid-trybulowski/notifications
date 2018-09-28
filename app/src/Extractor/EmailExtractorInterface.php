<?php

namespace App\src\Extractor;


use App\src\Entity\EmailEntity;

/**
 * Interface EmailExtractorInterface
 * @package App\src\Extractor
 */
interface EmailExtractorInterface
{
    /**
     * @param EmailEntity $emailEntity
     * @return array
     */
    public function extract(EmailEntity $emailEntity);
}