<?php

namespace RescuePrincess\Entities\Enemies;

use RescuePrincess\Entities\AbstractCombatant;

/**
 * The fearsome Dragon
 * Breathes fire and deprecated code
 */
class Dragon extends AbstractCombatant
{
    public function __construct()
    {
        parent::__construct('🐉 Ancient Dragon of Legacy Code', 80);
    }

    /**
     * Dragons drop good loot
     */
    public function getExperienceReward(): int
    {
        return 75;
    }
}
