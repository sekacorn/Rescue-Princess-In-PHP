<?php

namespace RescuePrincess\Core;

/**
 * Singleton pattern for game logging
 * Because global state is fine when you call it a "design pattern"
 */
class GameLogger
{
    private static ?GameLogger $instance = null;
    private array $log = [];
    private bool $verbose = true;

    /**
     * Private constructor - you can't just 'new' a singleton!
     * That would be chaos! Controlled chaos is what we need!
     */
    private function __construct()
    {
        // Private like your embarrassing code from 2 years ago
    }

    /**
     * Get the singleton instance
     * Thread-safe? Maybe. Do we care? In PHP? LOL.
     */
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function log(string $message, string $level = 'INFO'): void
    {
        $timestamp = date('H:i:s');
        $entry = "[{$timestamp}] [{$level}] {$message}";
        $this->log[] = $entry;

        if ($this->verbose) {
            echo $entry . PHP_EOL;
        }
    }

    public function info(string $message): void
    {
        $this->log($message, 'INFO');
    }

    public function warning(string $message): void
    {
        $this->log($message, 'WARN');
    }

    public function error(string $message): void
    {
        $this->log($message, 'ERROR');
    }

    public function getLog(): array
    {
        return $this->log;
    }

    /**
     * Prevent cloning
     * One instance to rule them all
     */
    private function __clone()
    {
        // No cloning! This isn't Dolly the Sheep!
    }

    /**
     * Prevent unserialization
     * Security through obscurity? No, security through private methods!
     */
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize singleton");
    }
}
