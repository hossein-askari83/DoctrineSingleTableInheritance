<?php

namespace App\Http\Controllers\API\V1;

use App\DataTransferObjects\AdjectiveDTO;
use App\DataTransferObjects\VerbDTO;
use App\Entities\Adjective;
use App\Entities\Verb;
use App\Entities\Word;
use App\Http\Controllers\Controller;
use App\Services\AdjectiveService;
use App\Services\VerbService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use LaravelDoctrine\ORM\Facades\EntityManager;
use Symfony\Component\HttpFoundation\Response;

class AdjectiveController extends Controller
{
    public function __construct(
        protected AdjectiveService $service,
    ) {
    }

    public function store(Request $request)
    {
        $word_id = (int)$request->get('word');
        $word = EntityManager::find(Word::class,$word_id);
        $adjective_dto = new AdjectiveDTO($request->title,$word,$request->superlative_form,$request->comparative_form);
        $translation = $this->service->store($adjective_dto);
        $message = __('general.created_successfully', ['model' => class_basename(Adjective::class)]);
        return response()->json(['message' => $message, 'data' =>$translation], Response::HTTP_CREATED);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $adjective_dto = new AdjectiveDTO($request->title,null,$request->superlative_form,$request->comparative_form);
        $adjective = $this->service->update($adjective_dto,$id);
        $message = __('general.updated_successfully', ['model' => class_basename(Adjective::class)]);
        return response()->json(['message' => $message, 'data' =>$adjective], Response::HTTP_OK);
    }

    public function delete(int $id): JsonResponse
    {
        $adjective = $this->service->delete($id);
        $message = __('general.fetched_successfully', ['model' => class_basename(Adjective::class)]);
        return response()->json(['message' => $message, 'data' => $adjective], Response::HTTP_OK);
    }

    public function index(): JsonResponse
    {
        $adjectives = $this->service->index();
        $message = __('general.fetched_successfully', ['model' => class_basename(Adjective::class)]);
        return response()->json(['message' => $message, 'data' =>$adjectives], Response::HTTP_OK);
    }

    public function show(int $id)
    {
        $adjective = $this->service->show($id);
        $message = __('general.fetched_successfully', ['model' => class_basename(Adjective::class)]);
        return response()->json(['message' => $message, 'data' =>$adjective], Response::HTTP_OK);
    }
}
