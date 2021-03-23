<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Illuminate\Support\Str;

$factory->define(User::class, function () {
            return [
            'name' => 'admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$Dt6YyBnGIHSS1w3UaLmxMO79fFq0Wew0zGehlxNADlyEoU2iby/tG', // password
            'remember_token' => Str::random(10),
        ];
    });
