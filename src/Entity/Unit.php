<?php

namespace App\Entity;

use App\Repository\UnitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UnitRepository::class)
 */
class Unit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=ItemTypeSpecific::class, mappedBy="unit")
     */
    private $itemTypeSpecifics;

    public function __construct()
    {
        $this->itemTypeSpecifics = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, ItemTypeSpecific>
     */
    public function getItemTypeSpecifics(): Collection
    {
        return $this->itemTypeSpecifics;
    }

    public function addItemTypeSpecific(ItemTypeSpecific $itemTypeSpecific): self
    {
        if (!$this->itemTypeSpecifics->contains($itemTypeSpecific)) {
            $this->itemTypeSpecifics[] = $itemTypeSpecific;
            $itemTypeSpecific->setUnit($this);
        }

        return $this;
    }

    public function removeItemTypeSpecific(ItemTypeSpecific $itemTypeSpecific): self
    {
        if ($this->itemTypeSpecifics->removeElement($itemTypeSpecific)) {
            // set the owning side to null (unless already changed)
            if ($itemTypeSpecific->getUnit() === $this) {
                $itemTypeSpecific->setUnit(null);
            }
        }

        return $this;
    }
}
