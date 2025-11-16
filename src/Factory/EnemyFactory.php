<?php

namespace RescuePrincess\Factory;

use RescuePrincess\Interfaces\CombatantInterface;

/**
 * Factory pattern for creating enemies
 * Because manually newing up objects is so 2004
 */
class EnemyFactory
{
    /**
     * Create an enemy based on type
     * Factory pattern FTW!
     */
    public static function create(string $type): CombatantInterface
    {
        $enemyClass = "RescuePrincess\\Entities\\Enemies\\{$type}";

        if (!class_exists($enemyClass)) {
            throw new \Exception("Enemy type '{$type}' not found! Did you forget to run composer dump-autoload?");
        }

        return new $enemyClass();
    }

    /**
     * Get all available enemy types
     * Returns an array because PHP loves arrays more than your ex loves drama
     */
    public static function getAvailableTypes(): array
    {
        return ['Dragon', 'Guard', 'Bug'];
    }
}
