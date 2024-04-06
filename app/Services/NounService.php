<?php

namespace App\Services;

use App\DataTransferObjects\NounDTO;
use App\DataTransferObjects\TranslationDTO;
use App\DataTransferObjects\TranslationDTODTO;
use App\DataTransferObjects\VerbDTO;
use App\Entities\Noun;
use App\Entities\Translation;
use App\Entities\Verb;
use App\Entities\Word;
use Illuminate\Database\Eloquent\Collection;
use LaravelDoctrine\ORM\Facades\EntityManager;

class NounService
{

    public function index()
    {
        $translations = EntityManager::getRepository(Noun::class)->findAll();
        return  $translations;
    }
    public function store(NounDTO $dto): Translation
    {
        $noun = new Noun();
        $noun->setTitle($dto->title);
        $noun->setWord($dto->word);
        $noun->setPluralForm($dto->plural_form);
        EntityManager::persist($noun);
        EntityManager::flush($noun);
        return $noun;
    }
    public function show(int $id)
    {
        $noun = EntityManager::find(Noun::class,$id);
        return $noun;
    }
    public function update(NounDTO $dto, int $id): Translation
    {
        $noun = EntityManager::find(Noun::class,$id);
        $noun->setTitle($dto->title);
        $noun->setPluralForm($dto->plural_form);
        EntityManager::persist($noun);
        EntityManager::flush($noun);
        return $noun;
    }
    public function delete(int $id)
    {
        $noun = EntityManager::find(Noun::class,$id);
        EntityManager::remove($noun);
        EntityManager::flush($noun);
    }
}
