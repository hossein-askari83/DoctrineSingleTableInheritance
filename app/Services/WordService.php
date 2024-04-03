<?php
namespace App\Services;

use App\DataTransferObjects\WordDTO;
use App\Entities\Word;
use Illuminate\Database\Eloquent\Collection;
use LaravelDoctrine\ORM\Facades\EntityManager;

class WordService
{

    public function index(): array
    {
        $words = EntityManager::getRepository(Word::class)->findAll();
        return  $words;
    }
    public function store(string $title):Word
    {
        $word = new Word();
        $word->setTitle($title);
        EntityManager::persist($word);
        EntityManager::flush($word);
        return $word;
    }
    public function show(int $id)
    {
        $word = EntityManager::find(Word::class,$id);
        return $word;
    }
    public function update(string $title, int $id): Word
    {
        $word = EntityManager::find(Word::class,$id);
        $word->setTitle($title);
        EntityManager::persist($word);
        EntityManager::flush($word);
        return $word;
    }
    public function delete(int $id)
    {
        $word = EntityManager::find(Word::class,$id);
        EntityManager::remove($word);
        EntityManager::flush($word);
    }
}
