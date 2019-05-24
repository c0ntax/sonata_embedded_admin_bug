<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FlagsRepository")
 */
class Flags
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
    private $test = true;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $string = 'I am a default';

    /**
     * @var Container
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Container")
     * @ORM\JoinColumn(name="container_id", referencedColumnName="id")
     */
    private $container;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SubContainer", inversedBy="flagsCollection")
     */
    private $subContainer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTest(): ?bool
    {
        return $this->test;
    }

    public function setTest(bool $test): self
    {
        $this->test = $test;

        return $this;
    }

    /**
     * @return string
     */
    public function getString(): string
    {
        return $this->string;
    }

    /**
     * @param string $string
     * @return Flags
     */
    public function setString(string $string)
    {
        $this->string = $string;

        return $this;
    }

    public function getSubContainer(): ?SubContainer
    {
        return $this->subContainer;
    }

    public function setSubContainer(?SubContainer $subContainer): self
    {
        $this->subContainer = $subContainer;

        return $this;
    }
}
