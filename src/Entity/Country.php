<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CountryRepository;
use Doctrine\ORM\Mapping as ORM;

use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\GetCollection;

#[ORM\Entity(repositoryClass: CountryRepository::class)]
//#[ApiResource]
#[ApiResource(
    operations: [
        new Get(),
        new Put(),
        new Delete(),
        new Post(),
        new Patch(),
        new GetCollection()
    ]
)]
class Country
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private array $capital = [];

    #[ORM\Column(length: 255)]
    private ?string $region = null;

    #[ORM\Column(length: 255)]
    private ?string $subregion = null;

    #[ORM\Column]
    private array $languages = [];

    #[ORM\Column]
    private array $latlng = [];

    #[ORM\Column]
    private ?float $area = null;

    #[ORM\Column]
    private array $flags = [];

    #[ORM\Column]
    private array $currencies = [];

    #[ORM\Column(nullable: true)]
    private ?bool $independent = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $status = null;

    #[ORM\Column]
    private ?bool $landlocked = null;

    #[ORM\Column(nullable: true)]
    private array $maps = [];

    #[ORM\Column]
    private ?int $population = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCapital(): array
    {
        return $this->capital;
    }

    public function setCapital(array $capital): self
    {
        $this->capital = $capital;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getSubregion(): ?string
    {
        return $this->subregion;
    }

    public function setSubregion(string $subregion): self
    {
        $this->subregion = $subregion;

        return $this;
    }

    public function getLanguages(): array
    {
        return $this->languages;
    }

    public function setLanguages(array $languages): self
    {
        $this->languages = $languages;

        return $this;
    }

    public function getLatlng(): array
    {
        return $this->latlng;
    }

    public function setLatlng(array $latlng): self
    {
        $this->latlng = $latlng;

        return $this;
    }

    public function getArea(): ?float
    {
        return $this->area;
    }

    public function setArea(float $area): self
    {
        $this->area = $area;

        return $this;
    }

    public function getFlags(): array
    {
        return $this->flags;
    }

    public function setFlags(array $flags): self
    {
        $this->flags = $flags;

        return $this;
    }

    public function getCurrencies(): array
    {
        return $this->currencies;
    }

    public function setCurrencies(array $currencies): self
    {
        $this->currencies = $currencies;

        return $this;
    }

    public function isIndependent(): ?bool
    {
        return $this->independent;
    }

    public function setIndependent(?bool $independent): self
    {
        $this->independent = $independent;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function isLandlocked(): ?bool
    {
        return $this->landlocked;
    }

    public function setLandlocked(bool $landlocked): self
    {
        $this->landlocked = $landlocked;

        return $this;
    }

    public function getMaps(): array
    {
        return $this->maps;
    }

    public function setMaps(?array $maps): self
    {
        $this->maps = $maps;

        return $this;
    }

    public function getPopulation(): ?int
    {
        return $this->population;
    }

    public function setPopulation(int $population): self
    {
        $this->population = $population;

        return $this;
    }
}
