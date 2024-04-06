<?php

namespace App\DataTransferObjects;

use App\Entities\Word;
use Illuminate\Foundation\Http\FormRequest;

class VerbDTO
{
    public function __construct(
        public readonly string|null $title,
        public readonly Word|null $word,
        public readonly string|null $past_form ,
    ) {
    }
}
