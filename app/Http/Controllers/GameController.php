<?php

namespace App\Http\Controllers;

use App\Repositories\GameRepository;
use App\Services\GameChecker;
use App\Services\GameProcessor;
use Illuminate\View\View;

class GameController
{
    public function page(string $link, GameChecker $gameChecker): View
    {
        if (!$gameChecker->check($link)) {
            abort(404);
        }
        return view('game.page', compact('link'));
    }

    public function history(string $link, GameRepository $repository, GameChecker $gameChecker): View
    {
        if (!$gameChecker->check($link)) {
            abort(404);
        }
        $history = $repository->getHistory($link);
        return view('game.history', compact('link', 'history'));
    }

    public function feelingLucky(string $link, GameProcessor $casino): View
    {
        $gameResultDto = $casino->play($link);
        return view('game.feeling-lucky', compact('link', 'gameResultDto'));
    }
}
