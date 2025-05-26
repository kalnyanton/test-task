<?php

namespace App\Repositories;

use App\DTO\GameResultDTO;
use App\Models\Game;
use Illuminate\Support\Collection;

class GameRepository
{
    public const HISTORY_LIMIT = 3;

    public function __construct(private GameAccountRepository $gameAccountRepository)
    {
    }

    public function getHistory(string $link, int $limit = self::HISTORY_LIMIT): Collection
    {
        $gameAccount = $this->gameAccountRepository->getGameAccountByLink($link);

        $historyArray = Game::query()->where('game_account_id', $gameAccount->id)
            ->orderByDesc('id')
            ->limit($limit)
            ->get()
            ->toArray();

        return collect($historyArray)->map(function ($historyItem) {
            return new GameResultDTO(
                $historyItem['quantity'],
                $historyItem['result'],
                $historyItem['win_amount']
            );
        });
    }

    public function addGame(int $gameAccountId, GameResultDTO $gameResultDTO): void
    {
        Game::create([
            'game_account_id' => $gameAccountId,
            'quantity' => $gameResultDTO->quantity,
            'result' => $gameResultDTO->result,
            'win_amount' => $gameResultDTO->winAmount,
        ]);
    }
}
