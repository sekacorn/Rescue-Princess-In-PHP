<?php

namespace RescuePrincess\Items;

use RescuePrincess\Interfaces\CombatantInterface;

/**
 * PHP Manual - Ultimate weapon
 * Heavy enough to knock out a dragon
 */
class PhpManual extends Item
{
    public function __construct()
    {
        parent::__construct(
            'PHP Manual (Printed)',
            'A 3000-page printed PHP manual. Can be used as a weapon. Weighs more than your career choices.'
        );
    }

    public function use(CombatantInterface $target = null): string
    {
        if ($target === null) {
            return "You flip through the manual looking for array_* functions. There are 79 of them. WHY?!";
        }

        $damage = 30;
        $target->takeDamage($damage);
        return "You smack {$target->getName()} with the PHP Manual for {$damage} damage! They're now confused about the difference between == and ===!";
    }
}
