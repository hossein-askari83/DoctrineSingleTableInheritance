<?php

namespace App\Http\Controllers\API\V1;

use App\DataTransferObjects\AdjectiveDTO;
use App\DataTransferObjects\NounDTO;
use App\DataTransferObjects\VerbDTO;
use App\Entities\Adjective;
use App\Entities\Noun;
use App\Entities\Verb;
use App\Entities\Word;
use App\Http\Controllers\Controller;
use App\Services\AdjectiveService;
use App\Services\NounService;
use App\Services\VerbService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use LaravelDoctrine\ORM\Facades\EntityManager;
use Symfony\Component\HttpFoundation\Response;

class NounController extends Controller
{
    public function __construct(
        protected NounService $service,
    ) {
    }

    public function store(Request $request)
    {
        $word_id = (int)$request->get('word');
        $word = EntityManager::find(Word::class,$word_id);
        $noun_dto = new NounDTO($request->title,$word,$request->plural_form);
        $translation = $this->service->store($noun_dto);
        $message = __('general.created_successfully', ['model' => class_basename(Noun::class)]);
        return response()->json(['message' => $message, 'data' =>$translation], Response::HTTP_CREATED);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $noun_dto = new NounDTO($request->title,null,$request->plural_form);
        $noun = $this->service->update($noun_dto,$id);
        $message = __('general.updated_successfully', ['model' => class_basename(Noun::class)]);
        return response()->json(['message' => $message, 'data' =>$noun], Response::HTTP_OK);
    }

    public function delete(int $id): JsonResponse
    {
        $noun = $this->service->delete($id);
        $message = __('general.fetched_successfully', ['model' => class_basename(Noun::class)]);
        return response()->json(['message' => $message, 'data' => $noun], Response::HTTP_OK);
    }

    public function index(): JsonResponse
    {
        $nouns = $this->service->index();
        $message = __('general.fetched_successfully', ['model' => class_basename(Noun::class)]);
        return response()->json(['message' => $message, 'data' =>$nouns], Response::HTTP_OK);
    }

    public function show(int $id)
    {
        $noun = $this->service->show($id);
        $message = __('general.fetched_successfully', ['model' => class_basename(Noun::class)]);
        return response()->json(['message' => $message, 'data' =>$noun], Response::HTTP_OK);
    }
}
