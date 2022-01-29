<?php

namespace App\Entity;

use App\Repository\UtilisateursRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateursRepository::class)]
class Utilisateurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Pseudo;

    #[ORM\Column(type: 'string', length: 255)]
    private $MDP;

    #[ORM\Column(type: 'blob', nullable: true)]
    private $PhotoProfil;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->Pseudo;
    }

    public function setPseudo(string $Pseudo): self
    {
        $this->Pseudo = $Pseudo;

        return $this;
    }

    public function getMDP(): ?string
    {
        return $this->MDP;
    }

    public function setMDP(string $MDP): self
    {
        $this->MDP = $MDP;

        return $this;
    }

    public function getPhotoProfil()
    {
        return $this->PhotoProfil;
    }

    public function setPhotoProfil($PhotoProfil): self
    {
        $this->PhotoProfil = $PhotoProfil;

        return $this;
    }
}
