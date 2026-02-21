<?php

namespace App\dtos;

use App\Models\Game;

class DtoGame{

    protected int $id;
    protected string $name;
    protected string $description;
    protected float $price;
    protected int $amount;

    public static function castGame(Game $game): DtoGame{
        $dto = new DtoGame();

        $dto->id = $game->id;
        $dto->name = $game->name;
        $dto->description = $game->description;
        $dto->price = $game->price;
        $dto->amount = 1;

        return $dto;
    }

    // Getter y Setter para $id
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    // Getter y Setter para $name
    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    // Getter y Setter para $description
    public function getDescription(): string
    {
        return $this->description;
    }
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    // Getter y Setter para $price
    public function getPrice(): float
    {
        return $this->price;
    }
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    // Getter y Setter para $amount
    public function getAmount(): int
    {
        return $this->amount;
    }
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

}
