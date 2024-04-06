<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
use LaravelDoctrine\ORM\Facades\EntityManager;

/**
 * @ORM\Entity
  */
class Adjective extends Translation implements JsonSerializable
{
    /**
     * @ORM\Column(type="string")
     */
    private string $superlative_form;


    /**
     * @ORM\Column(type="string")
     */
    private string $comparative_form;

    public function setSuperlativeForm(string $superlative_form): void
    {
      $this->superlative_form = $superlative_form;
    }
    public function getSuperlativeForm()
    {
      return $this->superlative_form;
    }
    public function setComparativeForm(string $comparative_form): void
    {
      $this->comparative_form = $comparative_form;
    }
    public function getComparativeForm()
    {
      return $this->comparative_form;
    }

    public function jsonSerialize() {
      return [
        'id' => parent::getId(),
        'title' => parent::getTitle(),
        'superlative_form'=>$this->superlative_form,
        'comparative_form'=>$this->comparative_form,
      ];
  }

}