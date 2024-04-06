<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
use LaravelDoctrine\ORM\Facades\EntityManager;

/**
 * @ORM\Entity
  */
class Verb extends Translation implements JsonSerializable
{
    /**
     * @ORM\Column(type="string")
     */
    private string $past_form;

    public function setPastForm(string $past_form): void
    {
      $this->past_form = $past_form;
    }

    public function getPastForm()
    {
      return $this->past_form;
    }
    public function jsonSerialize() {
        return [
          'id' => parent::getId(),
          'title' => parent::getTitle(),
          'past_form'=>$this->past_form,
        ];
    }
}