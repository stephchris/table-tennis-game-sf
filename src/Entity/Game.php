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
    private ?int $roundNumber = null;

    #[ORM\Column]
    private ?int $tableNumber = null;

    #[ORM\Column]
    private ?int $scorePlayerOne = null;

    #[ORM\Column]
    private ?int $scorePlayerTwo = null;

    #[ORM\ManyToOne(inversedBy: 'games')]
    private ?Tournament $tournament = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoundNumber(): ?int
    {
        return $this->roundNumber;
    }

    public function setRoundNumber(int $roundNumber): self
    {
        $this->roundNumber = $roundNumber;

        return $this;
    }

    public function getTableNumber(): ?int
    {
        return $this->tableNumber;
    }

    public function setTableNumber(int $tableNumber): self
    {
        $this->tableNumber = $tableNumber;

        return $this;
    }

    public function getScorePlayerOne(): ?int
    {
        return $this->scorePlayerOne;
    }

    public function setScorePlayerOne(int $scorePlayerOne): self
    {
        $this->scorePlayerOne = $scorePlayerOne;

        return $this;
    }

    public function getScorePlayerTwo(): ?int
    {
        return $this->scorePlayerTwo;
    }

    public function setScorePlayerTwo(int $scorePlayerTwo): self
    {
        $this->scorePlayerTwo = $scorePlayerTwo;

        return $this;
    }

    public function getTournament(): ?Tournament
    {
        return $this->tournament;
    }

    public function setTournament(?Tournament $tournament): self
    {
        $this->tournament = $tournament;

        return $this;
    }

}