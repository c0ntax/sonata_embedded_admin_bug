<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChildRepository")
 */
class Child
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $propertyOne = false;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $propertyTwo = 'Always set';

    /**
     * @ORM\Column(type="boolean")
     */
    private $propertyThree = true;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Container", mappedBy="child", cascade={"persist", "remove"})
     */
    private $container;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPropertyOne(): ?bool
    {
        return $this->propertyOne;
    }

    public function setPropertyOne(bool $propertyOne): self
    {
        $this->propertyOne = $propertyOne;

        return $this;
    }

    public function getPropertyTwo(): ?string
    {
        return $this->propertyTwo;
    }

    public function setPropertyTwo(string $propertyTwo): self
    {
        $this->propertyTwo = $propertyTwo;

        return $this;
    }

    public function getPropertyThree(): ?bool
    {
        return $this->propertyThree;
    }

    public function setPropertyThree(bool $propertyThree): self
    {
        $this->propertyThree = $propertyThree;

        return $this;
    }

    public function getContainer(): ?Container
    {
        return $this->container;
    }

    public function setContainer(Container $container): self
    {
        $this->container = $container;

        // set the owning side of the relation if necessary
        if ($this !== $container->getChild()) {
            $container->setChild($this);
        }

        return $this;
    }
}
