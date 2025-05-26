<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterForm;
use App\Services\LinkDeactivator;
use App\Services\LinkRegenerator;
use App\Services\RegisterService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RegisterController
{
    public function home(): View
    {
        return view('account.register-form');
    }

    public function register(RegisterForm $form, RegisterService $registerService): RedirectResponse
    {
        $link = $registerService->register($form->getDto());
        return redirect()->route('game.page', compact('link'));
    }

    public function deactivate(string $link, LinkDeactivator $linkDeactivator): RedirectResponse
    {
        $linkDeactivator->deactivate($link);
        return redirect()->route('account.register-form');
    }

    public function regenerate(string $link, LinkRegenerator $linkRegenerator): RedirectResponse
    {
        $link = $linkRegenerator->regenerate($link);
        return redirect()->route('game.page', compact('link'));
    }
}
