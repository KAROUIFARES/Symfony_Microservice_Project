<?php

namespace App\Entity;

use App\Repository\CommandRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandRepository::class)]
class Command
{
    #[ORM\Id]
    #[ORM\Column(type: Types::GUID)]
    private ?string $Id = null;

    #[ORM\Column(type: Types::GUID)]
    private ?string $ProductId = null;

    #[ORM\Column]
    private ?int $Quantity = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $Price = null;

    #[ORM\Column(length: 255)]
    private ?string $Adress = null;

    #[ORM\Column(length: 8)]
    private ?string $phone = null;

    public function getId(): ?string
    {
        return $this->Id;
    }

    public function setId(string $Id): static
    {
        $this->Id = $Id;

        return $this;
    }

    public function getProductId(): ?string
    {
        return $this->ProductId;
    }

    public function setProductId(string $ProductId): static
    {
        $this->ProductId = $ProductId;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->Quantity;
    }

    public function setQuantity(int $Quantity): static
    {
        $this->Quantity = $Quantity;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->Price;
    }

    public function setPrice(string $Price): static
    {
        $this->Price = $Price;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->Adress;
    }

    public function setAdress(string $Adress): static
    {
        $this->Adress = $Adress;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }
}
