<?php

namespace App\Services;

use App\DataTransferObjects\TranslationDTO;
use App\DataTransferObjects\TranslationDTODTO;
use App\DataTransferObjects\VerbDTO;
use App\Entities\Translation;
use App\Entities\Verb;
use App\Entities\Word;
use Illuminate\Database\Eloquent\Collection;
use LaravelDoctrine\ORM\Facades\EntityManager;

class VerbService
{

    public function index()
    {
        $translations = EntityManager::getRepository(Verb::class)->findAll();
        return  $translations;
    }
    public function store(VerbDTO $dto): Translation
    {
        $verb = new Verb();
        $verb->setTitle($dto->title);
        $verb->setWord($dto->word);
        $verb->setPastForm($dto->past_form);
        EntityManager::persist($verb);
        EntityManager::flush($verb);
        return $verb;
    }
    public function show(int $id)
    {
        $verb = EntityManager::find(Verb::class,$id);
        return $verb;
    }
    public function update(VerbDTO $dto, int $id): Translation
    {
        $verb = EntityManager::find(Verb::class,$id);
        $verb->setTitle($dto->title);
        $verb->setPastForm($dto->past_form);
        EntityManager::persist($verb);
        EntityManager::flush($verb);
        return $verb;
    }
    public function delete(int $id)
    {
        $verb = EntityManager::find(Verb::class,$id);
        EntityManager::remove($verb);
        EntityManager::flush($verb);
    }
}
