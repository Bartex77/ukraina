<?php

namespace App\Entity;

use App\Repository\ItemTypeSpecificRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ItemTypeSpecificRepository::class)
 */
class ItemTypeSpecific
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
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=ItemType::class, inversedBy="itemTypeSpecifics")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ItemType;

    /**
     * @ORM\ManyToOne(targetEntity=Unit::class, inversedBy="itemTypeSpecifics")
     */
    private $unit;

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

    public function getItemType(): ?ItemType
    {
        return $this->ItemType;
    }

    public function setItemType(?ItemType $ItemType): self
    {
        $this->ItemType = $ItemType;

        return $this;
    }

    public function getUnit(): ?Unit
    {
        return $this->unit;
    }

    public function setUnit(?Unit $unit): self
    {
        $this->unit = $unit;

        return $this;
    }
}
