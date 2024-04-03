<?php

namespace App\Http\Controllers\API\V1;

use App\DataTransferObjects\AdjectiveDTO;
use App\DataTransferObjects\NounDTO;
use App\DataTransferObjects\TranslationDTO;
use App\DataTransferObjects\VerbDTO;
use App\DataTransferObjects\WordDTO;
use App\Enums\TranslationTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Book\StoreBookRequest;
use App\Http\Requests\Book\UpdateBookRequest;
use App\Http\Requests\Translation\StoreTranslationRequest;
use App\Http\Requests\Word\StoreWordRequest;
use App\Http\Requests\Word\UpdateWordRequest;
use App\Http\Resources\BookResource;
use App\Http\Resources\TranslationResource;
use App\Http\Resources\WordResource;
use App\Models\Noun;
use App\Models\Translation;
use App\Models\Word;
use App\Services\AdjectiveService;
use App\Services\NounService;
use App\Services\TranslationService;
use App\Services\VerbService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class TranslationController extends Controller
{
    public function __construct(
        protected TranslationService $translationService,
    ) {
    }

    public function store(Request $request): JsonResponse
    {

        DB::beginTransaction();
        try {
            $translation = $this->translationService->store(TranslationDTO::fromRequest($request));

            switch ($request->get('translation_type')) {
                case TranslationTypeEnum::Adjective->value:
                    $DTO = new AdjectiveDTO($request->get('superlative_form'), $request->get('comparative_form'), $translation->id);
                    $this->adjectiveService->store($DTO);
                    break;
                case TranslationTypeEnum::Noun->value:
                    $DTO = new NounDTO($request->get('plural_form'), $translation->id);
                    $this->nounService->store($DTO);
                    break;

                case TranslationTypeEnum::Verb->value:
                    $DTO = new VerbDTO($request->get('past_form'), $translation->id);
                    $this->verbService->store($DTO);
                    break;
            }
            $message = __('general.created_successfully', ['model' => class_basename(Translation::class)]);
            DB::commit();
            return response()->json(['message' => $message, 'data' => TranslationResource::make($translation)], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message' => __('general.something_went_wrong'), 'data' => $th->getMessage()], Response::HTTP_SERVICE_UNAVAILABLE);
        }
    }
}
