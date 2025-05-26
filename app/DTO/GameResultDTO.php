<?php

namespace App\DTO;

class GameResultDTO
{
    public function __construct(
        public int $quantity,
        public string $result,
        public int $winAmount
    )
    {
    }
}
