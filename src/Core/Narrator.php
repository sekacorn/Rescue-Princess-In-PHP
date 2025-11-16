<?php

namespace RescuePrincess\Core;

/**
 * Narrator class
 * Tells the story with dramatic flair
 */
class Narrator
{
    /**
     * Display text with typewriter effect
     */
    public static function tell(string $text, int $delayMs = 30): void
    {
        $chars = mb_str_split($text);
        foreach ($chars as $char) {
            echo $char;
            if ($char !== ' ') {
                usleep($delayMs * 1000);
            }
        }
        echo PHP_EOL;
    }

    /**
     * Display text normally (for when we're in a hurry)
     */
    public static function say(string $text): void
    {
        echo $text . PHP_EOL;
    }

    /**
     * Show an important message
     */
    public static function announce(string $text): void
    {
        echo "\n" . str_repeat("=", 70) . PHP_EOL;
        echo "  " . $text . PHP_EOL;
        echo str_repeat("=", 70) . "\n" . PHP_EOL;
    }

    /**
     * Pause for dramatic effect
     */
    public static function pause(int $seconds = 1): void
    {
        sleep($seconds);
    }

    /**
     * Get intro story
     */
    public static function getIntro(): array
    {
        return [
            "In a land far, far away...",
            "Where legacy code runs rampant and bugs roam free...",
            "The beautiful Princess PHPegasus has been captured!",
            "",
            "Trapped in the Castle of Legacy Code by the fearsome Dragon,",
            "she awaits a hero brave enough to face deprecated functions,",
            "memory leaks, and the dreaded undefined variable errors.",
            "",
            "You are Sir PHP Developer, knight of the Modern Framework.",
            "Armed with your knowledge of design patterns and best practices,",
            "you must venture forth to rescue the princess!",
            "",
            "Your quest begins now...",
        ];
    }

    /**
     * Get castle approach text
     */
    public static function getCastleApproach(): array
    {
        return [
            "You approach the ominous Castle of Legacy Code.",
            "The walls are built from deprecated PHP 4 functions.",
            "Warnings and notices echo through the halls.",
            "This is it. Time to be a hero.",
        ];
    }
}
