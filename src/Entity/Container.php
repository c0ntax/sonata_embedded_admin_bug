<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContainerRepository")
 */
class Container
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var Flags
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Flags", cascade={"persist", "remove"})
     */
    private $flags;

    /**
     * @var ArrayCollection|Flags[]
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Flags", cascade={"persist", "remove"}, mappedBy="container")
     */
    private $flagsCollection;

    /**
     * @var ArrayCollection|SubContainer[]
     *
     * @ORM\OneToMany(targetEntity="App\Entity\SubContainer", cascade={"persist", "remove"}, mappedBy="container")
     */
    private $subContainerCollection;

    public function __construct()
    {
        $this->flagsCollection = new ArrayCollection();
        $this->subContainerCollection = new ArrayCollection();
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
     * @return Flags[]|ArrayCollection
     */
    public function getFlagsCollection()
    {
        return $this->flagsCollection;
    }

    /**
     * @param Flags[]|ArrayCollection $flagsCollection
     * @return Container
     */
    public function setFlagsCollection($flagsCollection)
    {
        $this->flagsCollection = $flagsCollection;

        return $this;
    }

    /**
     * @param Flags $flagsCollection
     */
    public function addFlagsCollection(Flags $flagsCollection)
    {
        $this->flagsCollection->add($flagsCollection);
    }

    /**
     * @param Flags $flagsCollection
     */
    public function removeFlagsCollection(Flags $flagsCollection)
    {
        $this->flagsCollection->removeElement($flagsCollection);
    }

    /**
     * @return SubContainer[]|ArrayCollection
     */
    public function getSubContainerCollection()
    {
        return $this->subContainerCollection;
    }

    /**
     * @param SubContainer[]|ArrayCollection $subContainerCollection
     * @return Container
     */
    public function setSubContainerCollection($subContainerCollection)
    {
        $this->subContainerCollection = $subContainerCollection;

        return $this;
    }

    /**
     * @param SubContainer $subContainerCollection
     */
    public function addSubContainerCollection(SubContainer $subContainerCollection)
    {
        $this->subContainerCollection->add($subContainerCollection);
    }

    /**
     * @param SubContainer $subContainerCollection
     */
    public function removeSubContainerCollection(SubContainer $subContainerCollection)
    {
        $this->subContainerCollection->removeElement($subContainerCollection);
    }
}
