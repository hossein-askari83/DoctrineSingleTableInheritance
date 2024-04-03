<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
use LaravelDoctrine\ORM\Facades\EntityManager;

/**
 * @ORM\Entity
  */
class Adjective extends Translation
{
    /**
     * @ORM\Column(type="string")
     */
    private string $superlative_form;


    /**
     * @ORM\Column(type="string")
     */
    private string $comparative_form;

}