<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SubContainerRepository")
 */
class SubContainer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Flags", cascade={"persist", "remove"})
     */
    private $flags;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Flags", mappedBy="subContainer")
     */
    private $flagsCollection;

    /**
     * @var Container
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Container", inversedBy="subContainerCollection")
     */
    private $container;

    public function __construct()
    {
        $this->flagsCollection = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFlags(): ?Flags
    {
        return $this->flags;
    }

    public function setFlags(?Flags $flags): self
    {
        $this->flags = $flags;

        return $this;
    }

    /**
     * @return Collection|Flags[]
     */
    public function getFlagsCollection(): Collection
    {
        return $this->flagsCollection;
    }

    public function addFlagsCollection(Flags $flagsCollection): self
    {
        if (!$this->flagsCollection->contains($flagsCollection)) {
            $this->flagsCollection[] = $flagsCollection;
            $flagsCollection->setSubContainer($this);
        }

        return $this;
    }

    public function removeFlagsCollection(Flags $flagsCollection): self
    {
        if ($this->flagsCollection->contains($flagsCollection)) {
            $this->flagsCollection->removeElement($flagsCollection);
            // set the owning side to null (unless already changed)
            if ($flagsCollection->getSubContainer() === $this) {
                $flagsCollection->setSubContainer(null);
            }
        }

        return $this;
    }
}
