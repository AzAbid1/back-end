<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ChapitreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ChapitreRepository::class)
 */
class Chapitre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity=cours::class, inversedBy="chapitres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cours;

    /**
     * @ORM\OneToOne(targetEntity=Test::class, mappedBy="chapitre", cascade={"persist", "remove"})
     */
    private $test;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCours(): ?cours
    {
        return $this->cours;
    }

    public function setCours(?cours $cours): self
    {
        $this->cours = $cours;

        return $this;
    }

    public function getTest(): ?Test
    {
        return $this->test;
    }

    public function setTest(Test $test): self
    {
        // set the owning side of the relation if necessary
        if ($test->getChapitre() !== $this) {
            $test->setChapitre($this);
        }

        $this->test = $test;

        return $this;
    }
}
