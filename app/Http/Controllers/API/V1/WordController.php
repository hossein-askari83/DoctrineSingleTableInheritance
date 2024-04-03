<?php

namespace App\Http\Controllers\API\V1;


use App\Entities\Word;
use App\Http\Controllers\Controller;
use App\Services\WordService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WordController extends Controller
{
    public function __construct(protected WordService $service)
    {
    }

    public function store(Request $request): JsonResponse
    {
        $word = $this->service->store($request->title);
        $message = __('general.created_successfully', ['model' => class_basename(Word::class)]);
        return response()->json(['message' => $message, 'data' => $word], Response::HTTP_CREATED);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $word = $this->service->update($request->title, $id);
        $message = __('general.updated_successfully', ['model' => class_basename(Word::class)]);
        return response()->json(['message' => $message, 'data' =>$word], Response::HTTP_OK);
    }

    public function delete(int $id): JsonResponse
    {
        $word = $this->service->delete($id);
        $message = __('general.fetched_successfully', ['model' => class_basename(Word::class)]);
        return response()->json(['message' => $message, 'data' => $word], Response::HTTP_OK);
    }

    public function index(Request $request): JsonResponse
    {
        $words = $this->service->index();
        $message = __('general.fetched_successfully', ['model' => class_basename(Word::class)]);
        return response()->json(['message' => $message, 'data' =>$words], Response::HTTP_OK);
    }

    public function show(int $id)
    {
        $word = $this->service->show($id);
        $message = __('general.fetched_successfully', ['model' => class_basename(Word::class)]);
        // return response()->json(['message' => $message, 'data' => WordResource::make($word)], Response::HTTP_OK);
        return response()->json(['message' => $message, 'data' =>$word], Response::HTTP_OK);
    }
}
