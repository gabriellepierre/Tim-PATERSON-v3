<?php

namespace App\Entity;

use App\Repository\AuteursRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuteursRepository::class)]
class Auteurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $NNom;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Prenom;

    #[ORM\Column(type: 'text', nullable: true)]
    private $Description;

    #[ORM\Column(type: 'array', nullable: true)]
    private $ListeCreations = [];

    #[ORM\Column(type: 'string', length: 255)]
    private $Pseudo;

    #[ORM\ManyToOne(targetEntity: Article::class, inversedBy: 'AuteurAuteur')]
    private $article;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNNom(): ?string
    {
        return $this->NNom;
    }

    public function setNNom(string $NNom): self
    {
        $this->NNom = $NNom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(?string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getListeCreations(): ?array
    {
        return $this->ListeCreations;
    }

    public function setListeCreations(?array $ListeCreations): self
    {
        $this->ListeCreations = $ListeCreations;

        return $this;
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

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }
}
