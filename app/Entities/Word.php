<?php

namespace App\Entities;

use App\DataTransferObjects\WordDTO;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
use LaravelDoctrine\ORM\Facades\EntityManager;
use LaravelDoctrine\ORM\Serializers\JsonSerializer;

/**
 * @ORM\Entity
 * @ORM\Table(name="words")
 */
class Word implements JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
    * @ORM\OneToMany(targetEntity="Translation", mappedBy="word")
    */
    private Collection $translations;

    public function __construct() {
        $this->translations = new ArrayCollection();
    }

    /**
     * @ORM\Column(type="string")
     */
    private string $title;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getTranslations()
    {
        return $this->translations;
    }
    public function addTranslation(Translation $translation)
    {
        $translation->setWord($this);
        $this->translations->add($translation);
    }
    
    public function jsonSerialize() 
    {
        return [
          'id' => $this->id,
          'title' => $this->title,
          'translations'=>$this->translations->toArray()
        ];
    }

}