<?php

namespace App\Http\Controllers\API\V1;


use App\DataTransferObjects\TranslationDTO;
use App\Entities\Translation;
use App\Http\Controllers\Controller;
use App\Http\Resources\TranslationResource;
use App\Services\TranslationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class TranslationController extends Controller
{
    public function __construct(
        protected TranslationService $translationService,
    ) {
    }

    public function store(Request $request): JsonResponse
    {
        $translation = $this->translationService->store(TranslationDTO::fromRequest($request));
        $message = __('general.created_successfully', ['model' => class_basename(Translation::class)]);
        return response()->json(['message' => $message, 'data' =>$translation], Response::HTTP_CREATED);
    }
}
