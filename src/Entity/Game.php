<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameRepository::class)]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $round_number = null;

    #[ORM\Column]
    private ?float $roundNumber = null;

    #[ORM\Column]
    private ?float $tableNumber = null;

    #[ORM\Column]
    private ?float $scorePlayerOne = null;

    #[ORM\Column]
    private ?float $scorePlayerTwo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoundNumber(): ?float
    {
        return $this->round_number;
    }

    public function setRoundNumber(float $round_number): self
    {
        $this->round_number = $round_number;

        return $this;
    }

    public function getTableNumber(): ?float
    {
        return $this->tableNumber;
    }

    public function setTableNumber(float $tableNumber): self
    {
        $this->tableNumber = $tableNumber;

        return $this;
    }

    public function getScorePlayerOne(): ?float
    {
        return $this->scorePlayerOne;
    }

    public function setScorePlayerOne(float $scorePlayerOne): self
    {
        $this->scorePlayerOne = $scorePlayerOne;

        return $this;
    }

    public function getScorePlayerTwo(): ?float
    {
        return $this->scorePlayerTwo;
    }

    public function setScorePlayerTwo(float $scorePlayerTwo): self
    {
        $this->scorePlayerTwo = $scorePlayerTwo;

        return $this;
    }
}
