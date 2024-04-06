<?php

namespace App\DataTransferObjects;

use App\Entities\Word;

class TranslationDTO
{
    public function __construct(
        public readonly string|null $title,
        public readonly Word $word,
    ) {
    }
}
