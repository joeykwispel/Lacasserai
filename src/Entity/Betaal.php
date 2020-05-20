<?php

namespace App\Entity;

use App\Repository\BetaalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BetaalRepository::class)
 */
class Betaal
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
    private $UserID;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Soort;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $CreditcardNR;

    /**
     * @ORM\Column(type="date")
     */
    private $BetaalDatum;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserID(): ?string
    {
        return $this->UserID;
    }

    public function setUserID(string $UserID): self
    {
        $this->UserID = $UserID;

        return $this;
    }

    public function getSoort(): ?string
    {
        return $this->Soort;
    }

    public function setSoort(string $Soort): self
    {
        $this->Soort = $Soort;

        return $this;
    }

    public function getCreditcardNR(): ?string
    {
        return $this->CreditcardNR;
    }

    public function setCreditcardNR(string $CreditcardNR): self
    {
        $this->CreditcardNR = $CreditcardNR;

        return $this;
    }

    public function getBetaalDatum(): ?\DateTimeInterface
    {
        return $this->BetaalDatum;
    }

    public function setBetaalDatum(\DateTimeInterface $BetaalDatum): self
    {
        $this->BetaalDatum = $BetaalDatum;

        return $this;
    }

    public function __toString():string
    {
        return $this->getUserID();
    }
}
