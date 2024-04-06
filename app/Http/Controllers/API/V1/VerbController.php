<?php

namespace App\Http\Controllers\API\V1;


use App\DataTransferObjects\VerbDTO;
use App\Entities\Verb;
use App\Entities\Word;
use App\Http\Controllers\Controller;
use App\Services\VerbService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use LaravelDoctrine\ORM\Facades\EntityManager;
use Symfony\Component\HttpFoundation\Response;

class VerbController extends Controller
{
    public function __construct(
        protected VerbService $service,
    ) {
    }

    public function store(Request $request)
    {
        $word_id = (int)$request->get('word');
        $word = EntityManager::find(Word::class,$word_id);
        $verb_dto = new VerbDTO($request->title,$word,$request->past_form);
        $translation = $this->service->store($verb_dto);
        $message = __('general.created_successfully', ['model' => class_basename(Verb::class)]);
        return response()->json(['message' => $message, 'data' =>$translation], Response::HTTP_CREATED);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $verb_dto = new VerbDTO($request->title,null,$request->past_form);
        $verb = $this->service->update($verb_dto,$id);
        $message = __('general.updated_successfully', ['model' => class_basename(Verb::class)]);
        return response()->json(['message' => $message, 'data' =>$verb], Response::HTTP_OK);
    }

    public function delete(int $id): JsonResponse
    {
        $verb = $this->service->delete($id);
        $message = __('general.fetched_successfully', ['model' => class_basename(Verb::class)]);
        return response()->json(['message' => $message, 'data' => $verb], Response::HTTP_OK);
    }

    public function index(): JsonResponse
    {
        $verbs = $this->service->index();
        $message = __('general.fetched_successfully', ['model' => class_basename(Verb::class)]);
        return response()->json(['message' => $message, 'data' =>$verbs], Response::HTTP_OK);
    }

    public function show(int $id)
    {
        $verb = $this->service->show($id);
        $message = __('general.fetched_successfully', ['model' => class_basename(Verb::class)]);
        return response()->json(['message' => $message, 'data' =>$verb], Response::HTTP_OK);
    }
}
