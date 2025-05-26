<?php

namespace App\Services;

use Illuminate\Support\Str;

class LinkHashGenerator
{
    public function generate(): string
    {
        return Str::random(64);
    }
}
