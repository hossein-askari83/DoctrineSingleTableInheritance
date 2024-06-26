<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
use LaravelDoctrine\ORM\Facades\EntityManager;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"translation" = "Translation", "verb" = "Verb","noun" = "Noun","adjective" = "Adjective"})
 */
class Translation
{

   /**
    * @ORM\ManyToOne(targetEntity="Word",inversedBy="Translation")
   */
    private Word $word;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string")
     */
    private string $title;


    public function getId(): string
    {
        return $this->id;
    }
    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setWord(Word $word): void
    {
        $this->word = $word;
    }
    public function getWord()
    {
        return $this->word;
    }

    // public function jsonSerialize() {
    //     return [
    //       'id' => $this->id,
    //       'title' => $this->title,
    //     ];
    //   }

}