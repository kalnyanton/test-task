<?php

namespace App\Repositories;

use App\DTO\RegisterDTO;
use App\Models\GameAccount;
use Carbon\Carbon;

class GameAccountRepository
{
    public function getGameAccountByUserName(string $username): ?GameAccount
    {
        return GameAccount::where('username', $username)
            ->where('active', true)
            ->whereDate('link_expires_at', '>', Carbon::now())
            ->first();
    }

    public function getGameAccountByLink(string $link): ?GameAccount
    {
        return GameAccount::where('link', $link)
            ->where('active', true)
            ->whereDate('link_expires_at', '>', Carbon::now())
            ->first();
    }

    public function createGameAccount(RegisterDTO $registerDTO, string $link, Carbon $expiresAt): void
    {
        GameAccount::create([
            'username' => $registerDTO->username,
            'phone_number' => $registerDTO->phoneNumber,
            'link' => $link,
            'link_expires_at' => $expiresAt,
            'active' => true
        ]);
    }

    public function deactivateAccount(string $link): void
    {
        GameAccount::where('link', $link)
            ->update(['active' => false]);
    }

    public function updateLink(string $link, string $newLink): void
    {
        GameAccount::where('link', $link)
            ->update(['link' => $newLink]);
    }
}
