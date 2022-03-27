<?php

namespace App\Entity;

use App\Repository\FoodTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FoodTypeRepository::class)
 */
class FoodType
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
     * @ORM\ManyToOne(targetEntity=FoodUnit::class, inversedBy="foodTypes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $unit;

    /**
     * @ORM\OneToMany(targetEntity=FoodTypeSpecific::class, mappedBy="foodType")
     */
    private $foodTypeSpecifics;

    public function __construct()
    {
        $this->foodTypeSpecifics = new ArrayCollection();
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

    public function getUnit(): ?FoodUnit
    {
        return $this->unit;
    }

    public function setUnit(?FoodUnit $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * @return Collection<int, FoodTypeSpecific>
     */
    public function getFoodTypeSpecifics(): Collection
    {
        return $this->foodTypeSpecifics;
    }

    public function addFoodTypeSpecific(FoodTypeSpecific $foodTypeSpecific): self
    {
        if (!$this->foodTypeSpecifics->contains($foodTypeSpecific)) {
            $this->foodTypeSpecifics[] = $foodTypeSpecific;
            $foodTypeSpecific->setFoodType($this);
        }

        return $this;
    }

    public function removeFoodTypeSpecific(FoodTypeSpecific $foodTypeSpecific): self
    {
        if ($this->foodTypeSpecifics->removeElement($foodTypeSpecific)) {
            // set the owning side to null (unless already changed)
            if ($foodTypeSpecific->getFoodType() === $this) {
                $foodTypeSpecific->setFoodType(null);
            }
        }

        return $this;
    }
}
