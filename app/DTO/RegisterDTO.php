<?php

namespace App\DTO;

class RegisterDTO
{
    public function __construct(
        public string $username,
        public string $phoneNumber
    )
    {
    }
}
