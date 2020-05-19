<?php

namespace App\Entity;

use App\Repository\KamerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KamerRepository::class)
 */
class Kamer
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
    private $Prijs;

    /**
     * @ORM\ManyToOne(targetEntity=Soort::class, inversedBy="kamers")
     */
    private $Soort;

    /**
     * @ORM\ManyToMany(targetEntity=Extras::class, inversedBy="kamers")
     */
    private $Extras;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="kamer")
     */
    private $Image;

    public function __construct()
    {
        $this->Extras = new ArrayCollection();
        $this->Image = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrijs(): ?string
    {
        return $this->Prijs;
    }

    public function setPrijs(string $Prijs): self
    {
        $this->Prijs = $Prijs;

        return $this;
    }

    public function getSoort(): ?Soort
    {
        return $this->Soort;
    }

    public function setSoort(?Soort $Soort): self
    {
        $this->Soort = $Soort;

        return $this;
    }

    /**
     * @return Collection|Extras[]
     */
    public function getExtras(): Collection
    {
        return $this->Extras;
    }

    public function addExtra(Extras $extra): self
    {
        if (!$this->Extras->contains($extra)) {
            $this->Extras[] = $extra;
        }

        return $this;
    }

    public function removeExtra(Extras $extra): self
    {
        if ($this->Extras->contains($extra)) {
            $this->Extras->removeElement($extra);
        }

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImage(): Collection
    {
        return $this->Image;
    }

    public function addImage(Image $image): self
    {
        if (!$this->Image->contains($image)) {
            $this->Image[] = $image;
            $image->setKamer($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->Image->contains($image)) {
            $this->Image->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getKamer() === $this) {
                $image->setKamer(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return (string) $this->getId();
    }
}
