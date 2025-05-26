<?php

namespace App\Services;

class RandomGenerator
{
    private const MAX_QUANTITY = 1000;
    public function generate(): int
    {
        return random_int(1, self::MAX_QUANTITY);
    }
}
