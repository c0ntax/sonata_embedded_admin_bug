<?php

namespace App\Entity;

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
     * @ORM\Column(type="boolean")
     */
    private $propertyOne = true;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Child", inversedBy="container", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $child;

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

    public function getChild(): ?Child
    {
        return $this->child;
    }

    public function setChild(Child $child): self
    {
        $this->child = $child;

        return $this;
    }
}
