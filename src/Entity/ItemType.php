<?php

namespace App\Entity;

use App\Repository\ItemTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ItemTypeRepository::class)
 */
class ItemType
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
     * @ORM\ManyToOne(targetEntity=Item::class, inversedBy="itemTypes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Item;

    /**
     * @ORM\OneToMany(targetEntity=ItemTypeSpecific::class, mappedBy="ItemType")
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

    public function getItem(): ?Item
    {
        return $this->Item;
    }

    public function setItem(?Item $Item): self
    {
        $this->Item = $Item;

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
            $itemTypeSpecific->setItemType($this);
        }

        return $this;
    }

    public function removeItemTypeSpecific(ItemTypeSpecific $itemTypeSpecific): self
    {
        if ($this->itemTypeSpecifics->removeElement($itemTypeSpecific)) {
            // set the owning side to null (unless already changed)
            if ($itemTypeSpecific->getItemType() === $this) {
                $itemTypeSpecific->setItemType(null);
            }
        }

        return $this;
    }
}
