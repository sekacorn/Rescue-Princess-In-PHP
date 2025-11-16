<?php

namespace RescuePrincess\Entities\Enemies;

use RescuePrincess\Entities\AbstractCombatant;

/**
 * The dreaded Bug
 * More dangerous than any dragon
 */
class Bug extends AbstractCombatant
{
    public function __construct()
    {
        parent::__construct('🐛 Critical Production Bug', 30);
    }

    /**
     * Bugs are easy to kill but annoying
     */
    public function getExperienceReward(): int
    {
        return 20;
    }

    /**
     * Override attack to make bugs unpredictable
     */
    public function attack(\RescuePrincess\Interfaces\CombatantInterface $target): int
    {
        // Bugs have a chance to be a critical hit (like production bugs always are)
        $isCritical = rand(1, 100) <= 25; // 25% chance

        if ($isCritical) {
            echo "💥 CRITICAL BUG! It's a race condition!" . PHP_EOL;
            $result = $this->attackStrategy->execute($this, $target);
            $critDamage = $result['damage'] * 2;
            $target->takeDamage($result['damage']); // Double damage!
            return $critDamage;
        }

        return parent::attack($target);
    }
}
