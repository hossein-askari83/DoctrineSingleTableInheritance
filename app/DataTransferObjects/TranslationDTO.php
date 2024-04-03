<?php

namespace App\DataTransferObjects;

use Illuminate\Foundation\Http\FormRequest;

class TranslationDTO
{
    public function __construct(
        public readonly string|null $title,
        public readonly int|null $word_id,
    ) {
    }

    public static function fromRequest(FormRequest $request): TranslationDTO
    {
        return new self(
            $request->validated('title'),
            $request->validated('word_id'),
        );
    }
}
