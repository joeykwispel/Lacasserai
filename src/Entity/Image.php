<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 */
class Image
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Kamer::class, inversedBy="Image")
     */
    private $kamer;

    /**
     * @ORM\Column(type="text")
     */
    private $ImageFile;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKamer(): ?Kamer
    {
        return $this->kamer;
    }

    public function setKamer(?Kamer $kamer): self
    {
        $this->kamer = $kamer;

        return $this;
    }

    public function getImageFile()
    {
        return $this->ImageFile;
    }

    public function setImageFile($ImageFile): self
    {
        $this->ImageFile = $ImageFile;

        return $this;
    }

    public function __toString():string
    {
        return $this->getImageFile();
    }
}
