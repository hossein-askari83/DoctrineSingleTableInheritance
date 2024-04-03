<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
use LaravelDoctrine\ORM\Facades\EntityManager;

/**
 * @ORM\Entity
  */
class Verb extends Translation
{
    /**
     * @ORM\Column(type="string")
     */
    private string $past_form;
}