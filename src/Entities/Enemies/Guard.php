<?php

namespace RescuePrincess\Entities\Enemies;

use RescuePrincess\Entities\AbstractCombatant;

/**
 * Castle Guard
 * Protects the castle with strict type checking
 */
class Guard extends AbstractCombatant
{
    public function __construct()
    {
        parent::__construct('🛡️  Castle Guard (Strict Type)', 50);
    }

    /**
     * Guards are common enemies
     */
    public function getExperienceReward(): int
    {
        return 30;
    }
}
