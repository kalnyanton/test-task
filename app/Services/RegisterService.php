<?php

namespace App\Services;

use App\DTO\RegisterDTO;
use App\Repositories\GameAccountRepository;
use Carbon\Carbon;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class RegisterService
{
    public function __construct(
        private LinkHashGenerator $linkHashGenerator,
        private GameAccountRepository $gameAccountRepository
    )
    {
    }

    public function register(RegisterDTO $registerDTO): string
    {
        $existsAccount = $this->gameAccountRepository->getGameAccountByUserName($registerDTO->username);

        if ($existsAccount) {
            throw new ConflictHttpException(__('Account already exists.'));
        }

        $link = $this->linkHashGenerator->generate();
        $this->gameAccountRepository->createGameAccount(
            $registerDTO,
            $link,
            Carbon::now()->addDays(7)
        );

        return $link;
    }
}
