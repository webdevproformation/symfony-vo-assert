<?php

namespace App\Entity\ValueObject;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Embeddable]
final class Etudiant
{
    public function __construct(
        #[ORM\Column(length: 255, nullable: true)]
        public ?string $firstname = null,
        
        #[ORM\Column(length: 255, nullable: true)]
        #[Assert\Email()] 
        // ici la validation ne semble pas fonctionner ?? 
        // uniquement un validation html pas une validation back
        public ?string $email = null
    )
    {
    }
}
