<?php

namespace App\Entity;

use App\Repository\ReserveringRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReserveringRepository::class)
 */
class Reservering
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Kamer::class, inversedBy="reserverings")
     */
    private $Kamer;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reserverings")
     */
    private $User;

    /**
     * @ORM\Column(type="date")
     */
    private $CheckinDate;

    /**
     * @ORM\Column(type="date")
     */
    private $CheckoutDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $BetaalMethode;

    /**
     * @ORM\OneToOne(targetEntity=Betaal::class, cascade={"persist", "remove"})
     */
    private $BetaalID;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKamer(): ?Kamer
    {
        return $this->Kamer;
    }

    public function setKamer(?Kamer $Kamer): self
    {
        $this->Kamer = $Kamer;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }

    public function getCheckinDate(): ?\DateTimeInterface
    {
        return $this->CheckinDate;
    }

    public function setCheckinDate(\DateTimeInterface $CheckinDate): self
    {
        $this->CheckinDate = $CheckinDate;

        return $this;
    }

    public function getCheckoutDate(): ?\DateTimeInterface
    {
        return $this->CheckoutDate;
    }

    public function setCheckoutDate(\DateTimeInterface $CheckoutDate): self
    {
        $this->CheckoutDate = $CheckoutDate;

        return $this;
    }

    public function getBetaalMethode(): ?string
    {
        return $this->BetaalMethode;
    }

    public function setBetaalMethode(string $BetaalMethode): self
    {
        $this->BetaalMethode = $BetaalMethode;

        return $this;
    }

    public function getBetaalID(): ?Betaal
    {
        return $this->BetaalID;
    }

    public function setBetaalID(?Betaal $BetaalID): self
    {
        $this->BetaalID = $BetaalID;

        return $this;
    }
}
