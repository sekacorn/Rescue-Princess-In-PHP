<?php

namespace RescuePrincess\Entities;

/**
 * The Princess
 * She's actually a senior developer who got trapped in legacy code
 */
class Princess
{
    private string $name = '👸 Princess PHPegasus';
    private bool $rescued = false;

    public function getName(): string
    {
        return $this->name;
    }

    public function rescue(): void
    {
        $this->rescued = true;
    }

    public function isRescued(): bool
    {
        return $this->rescued;
    }

    public function getThankYouMessage(): string
    {
        $messages = [
            "Thank you, brave knight! I was trapped in a recursive function with no base case!",
            "You saved me from an infinite loop of legacy code!",
            "Finally! I've been stuck in callback hell for weeks!",
            "My hero! That dragon was trying to make me maintain PHP 4 code!",
            "I'm free! Now let's refactor this entire kingdom!",
        ];

        return $messages[array_rand($messages)];
    }
}
