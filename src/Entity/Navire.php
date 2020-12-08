<?php

namespace App\Entity;

use App\Repository\NavireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NavireRepository::class)
 */
class Navire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=7)
     * @Assert\Regex(
     *     pattern="/[1-9]{7}/",
     *     message="Le numéro IMO doit comporter 7 chiffres"
     * )
     */
    private $imo;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\Length(
     */
    private $navire;

    /**
     * @ORM\Column(type="integer")
     */
    private $mmsi;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImo(): ?int
    {
        return $this->imo;
    }

    public function setImo(int $imo): self
    {
        $this->imo = $imo;

        return $this;
    }

    public function getNavire(): ?string
    {
        return $this->navire;
    }

    public function setNavire(string $navire): self
    {
        $this->navire = $navire;

        return $this;
    }

    public function getMmsi(): ?int
    {
        return $this->mmsi;
    }

    public function setMmsi(int $mmsi): self
    {
        $this->mmsi = $mmsi;

        return $this;
    }
}
