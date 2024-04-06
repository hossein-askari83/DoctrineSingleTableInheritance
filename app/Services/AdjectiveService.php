<?php

namespace App\Services;

use App\DataTransferObjects\AdjectiveDTO;
use App\DataTransferObjects\VerbDTO;
use App\Entities\Adjective;
use App\Entities\Translation;
use App\Entities\Verb;
use LaravelDoctrine\ORM\Facades\EntityManager;

class AdjectiveService
{

    public function index()
    {
        $translations = EntityManager::getRepository(Adjective::class)->findAll();
        return  $translations;
    }
    public function store(AdjectiveDTO $dto): Translation
    {
        $adjective = new Adjective();
        $adjective->setTitle($dto->title);
        $adjective->setWord($dto->word);
        $adjective->setSuperlativeForm($dto->superlative_form);
        $adjective->setComparativeForm($dto->comparative_form);
        EntityManager::persist($adjective);
        EntityManager::flush($adjective);
        return $adjective;
    }
    public function show(int $id)
    {
        $adjective = EntityManager::find(Adjective::class,$id);
        return $adjective;
    }
    public function update(AdjectiveDTO $dto, int $id): Translation
    {
        $adjective = EntityManager::find(Adjective::class,$id);
        $adjective->setTitle($dto->title);
        $adjective->setSuperlativeForm($dto->superlative_form);
        $adjective->setComparativeForm($dto->comparative_form);
        EntityManager::persist($adjective);
        EntityManager::flush($adjective);
        return $adjective;
    }
    public function delete(int $id)
    {
        $adjective = EntityManager::find(Adjective::class,$id);
        EntityManager::remove($adjective);
        EntityManager::flush($adjective);
    }
}
