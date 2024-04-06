<?php

namespace App\DataTransferObjects;

use App\Entities\Word;
use Illuminate\Foundation\Http\FormRequest;

class AdjectiveDTO
{
    public function __construct(
        public readonly string|null $title,
        public readonly Word|null $word,
        public readonly string|null $superlative_form ,
        public readonly string|null $comparative_form ,
    ) {
    }
}
