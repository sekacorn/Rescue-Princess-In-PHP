<?php

namespace RescuePrincess\Strategy;

use RescuePrincess\Interfaces\CombatantInterface;

/**
 * Deprecation Warning attack
 * Confuses and damages enemies with breaking changes
 */
class DeprecationWarning implements AttackStrategy
{
    public function execute(CombatantInterface $attacker, CombatantInterface $target): array
    {
        $damage = rand(15, 30);
        $target->takeDamage($damage);

        $warnings = [
            "Deprecated: mysql_* functions are deprecated in {$target->getName()} on line 1337",
            "Deprecated: split() is deprecated, use explode() instead!",
            "Deprecated: ereg() has been DEPRECATED as of PHP 5.3.0!",
            "Warning: Call-time pass-by-reference has been deprecated!",
        ];

        $warning = $warnings[array_rand($warnings)];

        return [
            'damage' => $damage,
            'message' => "{$attacker->getName()} casts DEPRECATION WARNING!\n{$warning}\n{$target->getName()} takes {$damage} damage from legacy code!"
        ];
    }
}
