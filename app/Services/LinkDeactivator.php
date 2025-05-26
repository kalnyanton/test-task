<?php

namespace App\Services;

use App\Repositories\GameAccountRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LinkDeactivator
{
    public function __construct(
        private GameChecker $gameChecker,
        private GameAccountRepository $gameAccountRepository
    )
    {
    }

    public function deactivate(string $link): void
    {
        if (!$this->gameChecker->check($link)) {
            throw new NotFoundHttpException();
        }

        $this->gameAccountRepository->deactivateAccount($link);
    }
}
