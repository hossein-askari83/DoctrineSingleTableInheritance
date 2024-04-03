<?php

namespace App\DataTransferObjects;

use App\Entities\Word;
use Illuminate\Foundation\Http\FormRequest;

class WordDTO
{
    public function __construct(public readonly string $title)
    {
    }

    public static function fromRequest(FormRequest $request): WordDTO
    {
        return new self(
            $request->validated('title'),
        );
    }
}