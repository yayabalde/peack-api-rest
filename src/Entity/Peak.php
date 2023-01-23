<?php

namespace App\Entity;

use App\Repository\PeakRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Metadata\ApiResource;

#[ApiResource]
#[ORM\Entity(repositoryClass: PeakRepository::class)]
class Peak
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank()]
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[Assert\NotBlank()]
    #[ORM\Column]
    private ?float $altitude = null;

    #[Assert\NotBlank()]
    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 10, nullable: true)]
    private ?string $lat = null;

    #[Assert\NotBlank()]
    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 10, nullable: true)]
    private ?string $lon = null;

    public function __construct($name=null, $altitude=null, $lat=null, $lon=null)
    {
        $this->name=$name;
        $this->altitude=$altitude;
        $this->lat=$lat;
        $this->lon=$lon;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLat(): ?string
    {
        return $this->lat;
    }

    public function setLat(?string $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLon(): ?string
    {
        return $this->lon;
    }

    public function setLon(?string $lon): self
    {
        $this->lon = $lon;

        return $this;
    }

    public function getAltitude(): ?float
    {
        return $this->altitude;
    }

    public function setAltitude(?float $altitude): self
    {
        $this->altitude = $altitude;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
