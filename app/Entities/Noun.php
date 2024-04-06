<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
use LaravelDoctrine\ORM\Facades\EntityManager;

/**
 * @ORM\Entity
  */
class Noun extends Translation implements JsonSerializable
{
    /**
     * @ORM\Column(type="string")
     */
    private string $plural_form;

    public function setPluralForm(string $plural_form): void
    {
      $this->plural_form = $plural_form;
    }

    public function getPluralForm()
    {
      return $this->plural_form;
    }
    public function jsonSerialize() {
        return [
          'id' => parent::getId(),
          'title' => parent::getTitle(),
          'plural_form'=>$this->plural_form,
        ];
    }
}