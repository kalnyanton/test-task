<?php

namespace App\Services;

use App\Repositories\GameAccountRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LinkRegenerator
{
    public function __construct(
        private GameChecker $gameChecker,
        private LinkHashGenerator $linkHashGenerator,
        private GameAccountRepository $gameAccountRepository
    )
    {
    }

    public function regenerate(string $link): string
    {
        if (!$this->gameChecker->check($link)) {
            throw new NotFoundHttpException();
        }
        $newLink = $this->linkHashGenerator->generate();

        $this->gameAccountRepository->updateLink($link, $newLink);

        return $newLink;
    }
}
