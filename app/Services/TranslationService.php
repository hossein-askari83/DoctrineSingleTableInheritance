<?php

namespace App\Services;

use App\DataTransferObjects\TranslationDTO;
use App\DataTransferObjects\TranslationDTODTO;
use App\Entities\Translation;
use Illuminate\Database\Eloquent\Collection;
use LaravelDoctrine\ORM\Facades\EntityManager;

class TranslationService
{

    public function index()
    {
        $translations = EntityManager::getRepository(Translation::class)->findAll();
        return  $translations;
    }
    public function store(TranslationDTO $dto): Translation
    {
        return Translation::create((array)$dto);
    }
    // public function show(int $id): Translation
    // {
    //     return Translation::findOrFail($id);
    // }
    // public function update(TranslationDTO $dto, int $id): Translation
    // {
    //     $Translation = Translation::findOrFail($id);
    //     return tap($Translation)->update(array_filter((array)$dto));
    // }
    // public function delete(int $id): bool
    // {
    //     $Translation = Translation::findOrFail($id);
    //     return $Translation->delete();
    // }
}
