<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PokemonRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PokemonRepository::class)
 */
class Pokemon
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
     * @ORM\Column(type="string", length=255)
     */
    private $type_1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_2;

    /**
     * @ORM\Column(type="integer")
     */
    private $total;

    /**
     * @ORM\Column(type="integer")
     */
    private $hp;

    /**
     * @ORM\Column(type="integer")
     */
    private $attack;

    /**
     * @ORM\Column(type="integer")
     */
    private $defense;

    /**
     * @ORM\Column(type="integer")
     */
    private $sp_atk;

    /**
     * @ORM\Column(type="integer")
     */
    private $sp_def;

    /**
     * @ORM\Column(type="integer")
     */
    private $speed;

    /**
     * @ORM\Column(type="integer")
     */
    private $generation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $legendary;

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

    public function getType1(): ?string
    {
        return $this->type_1;
    }

    public function setType1(string $type_1): self
    {
        $this->type_1 = $type_1;

        return $this;
    }

    public function getType2(): ?string
    {
        return $this->type_2;
    }

    public function setType2(string $type_2): self
    {
        $this->type_2 = $type_2;

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(int $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getHp(): ?int
    {
        return $this->hp;
    }

    public function setHp(int $hp): self
    {
        $this->hp = $hp;

        return $this;
    }

    public function getAttack(): ?int
    {
        return $this->attack;
    }

    public function setAttack(int $attack): self
    {
        $this->attack = $attack;

        return $this;
    }

    public function getDefense(): ?int
    {
        return $this->defense;
    }

    public function setDefense(int $defense): self
    {
        $this->defense = $defense;

        return $this;
    }

    public function getSpAtk(): ?int
    {
        return $this->sp_atk;
    }

    public function setSpAtk(int $sp_atk): self
    {
        $this->sp_atk = $sp_atk;

        return $this;
    }

    public function getSpDef(): ?int
    {
        return $this->sp_def;
    }

    public function setSpDef(int $sp_def): self
    {
        $this->sp_def = $sp_def;

        return $this;
    }

    public function getSpeed(): ?int
    {
        return $this->speed;
    }

    public function setSpeed(int $speed): self
    {
        $this->speed = $speed;

        return $this;
    }

    public function getGeneration(): ?int
    {
        return $this->generation;
    }

    public function setGeneration(int $generation): self
    {
        $this->generation = $generation;

        return $this;
    }

    public function isLegendary(): ?bool
    {
        return $this->legendary;
    }

    public function setLegendary(bool $legendary): self
    {
        $this->legendary = $legendary;

        return $this;
    }
}
