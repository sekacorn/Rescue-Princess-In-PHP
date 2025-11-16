<?php

namespace RescuePrincess\Strategy;

use RescuePrincess\Interfaces\CombatantInterface;

/**
 * Normal attack strategy
 * Boring but reliable, like PHP 5.6
 */
class NormalAttack implements AttackStrategy
{
    public function execute(CombatantInterface $attacker, CombatantInterface $target): array
    {
        $damage = rand(10, 20);
        $target->takeDamage($damage);

        return [
            'damage' => $damage,
            'message' => "{$attacker->getName()} attacks {$target->getName()} for {$damage} damage!"
        ];
    }
}
