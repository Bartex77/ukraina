<?php

namespace App\Entity;

use App\Repository\FoodUnitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FoodUnitRepository::class)
 */
class FoodUnit
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
     * @ORM\OneToMany(targetEntity=FoodType::class, mappedBy="unit")
     */
    private $foodTypes;

    public function __construct()
    {
        $this->foodTypes = new ArrayCollection();
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
     * @return Collection<int, FoodType>
     */
    public function getFoodTypes(): Collection
    {
        return $this->foodTypes;
    }

    public function addFoodType(FoodType $foodType): self
    {
        if (!$this->foodTypes->contains($foodType)) {
            $this->foodTypes[] = $foodType;
            $foodType->setUnit($this);
        }

        return $this;
    }

    public function removeFoodType(FoodType $foodType): self
    {
        if ($this->foodTypes->removeElement($foodType)) {
            // set the owning side to null (unless already changed)
            if ($foodType->getUnit() === $this) {
                $foodType->setUnit(null);
            }
        }

        return $this;
    }
}
