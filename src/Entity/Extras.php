<?php

namespace App\Entity;

use App\Repository\ExtrasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExtrasRepository::class)
 */
class Extras
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Omschrijving;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $MeerPrijs;

    /**
     * @ORM\ManyToMany(targetEntity=Kamer::class, mappedBy="Extras")
     */
    private $kamers;

    public function __construct()
    {
        $this->kamers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOmschrijving(): ?string
    {
        return $this->Omschrijving;
    }

    public function setOmschrijving(string $Omschrijving): self
    {
        $this->Omschrijving = $Omschrijving;

        return $this;
    }

    public function getMeerPrijs(): ?string
    {
        return $this->MeerPrijs;
    }

    public function setMeerPrijs(string $MeerPrijs): self
    {
        $this->MeerPrijs = $MeerPrijs;

        return $this;
    }

    /**
     * @return Collection|Kamer[]
     */
    public function getKamers(): Collection
    {
        return $this->kamers;
    }

    public function addKamer(Kamer $kamer): self
    {
        if (!$this->kamers->contains($kamer)) {
            $this->kamers[] = $kamer;
            $kamer->addExtra($this);
        }

        return $this;
    }

    public function removeKamer(Kamer $kamer): self
    {
        if ($this->kamers->contains($kamer)) {
            $this->kamers->removeElement($kamer);
            $kamer->removeExtra($this);
        }

        return $this;
    }
}
