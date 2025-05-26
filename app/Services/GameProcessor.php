<?php

namespace App\Services;

use App\DTO\GameResultDTO;
use App\Repositories\GameAccountRepository;
use App\Repositories\GameRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GameProcessor
{
    public function __construct(
        private GameChecker $gameChecker,
        private RandomGenerator $randomGenerator,
        private GameAccountRepository $gameAccountRepository,
        private GameRepository $gameRepository,
    )
    {
    }

    public function play(string $link): GameResultDTO
    {
        if (!$this->gameChecker->check($link)) {
            throw new NotFoundHttpException();
        }

        $randomQuantity = $this->randomGenerator->generate();
        $result = $this->isEvenNumber($randomQuantity) ? 'Win' : 'Lose';
        $winAmount = $this->getWinAmount($randomQuantity);
        $gameResultDto = new GameResultDTO($randomQuantity, $result, $winAmount);

        $gameAccount = $this->gameAccountRepository->getGameAccountByLink($link);

        $this->gameRepository->addGame($gameAccount->id, $gameResultDto);

        return $gameResultDto;
    }

    private function isEvenNumber(int $number): bool
    {
        return $number % 2 === 0;
    }

    private function getWinAmount(int $quantity): int
    {
        if (!$this->isEvenNumber($quantity)) {
            return 0;
        }

        if ($quantity > 900) {
            return $this->calculate($quantity, 70);
        }

        if ($quantity > 600) {
            return $this->calculate($quantity, 50);
        }

        if ($quantity > 300) {
            return $this->calculate($quantity, 30);
        }

        return $this->calculate($quantity, 10);
    }

    private function calculate(int $quantity, int $percent = 100): int
    {
        return round($quantity * $percent / 100);
    }
}
