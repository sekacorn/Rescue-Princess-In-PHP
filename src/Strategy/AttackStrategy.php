<?php

namespace RescuePrincess\Strategy;

use RescuePrincess\Interfaces\CombatantInterface;

/**
 * Strategy pattern for different attack types
 * Because choosing how to hit things requires ABSTRACTION
 */
interface AttackStrategy
{
    public function execute(CombatantInterface $attacker, CombatantInterface $target): array;
}
