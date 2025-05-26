<?php

namespace App\Services;

use App\Repositories\GameAccountRepository;

class GameChecker
{
    public function __construct(private GameAccountRepository $gameAccountRepository)
    {
    }

    public function check(string $link): bool
    {
        return $this->gameAccountRepository->getGameAccountByLink($link) !== null;
    }
}
