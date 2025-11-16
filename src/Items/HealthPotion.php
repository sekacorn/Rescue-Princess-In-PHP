<?php

namespace RescuePrincess\Items;

use RescuePrincess\Interfaces\CombatantInterface;

/**
 * Health Potion - Restores HP
 * Like Stack Overflow answers restore your sanity
 */
class HealthPotion extends Item
{
    private int $healAmount;

    public function __construct()
    {
        parent::__construct(
            'Stack Overflow Potion',
            'A mysterious potion filled with copied code snippets. Restores 50 HP.'
        );
        $this->healAmount = 50;
    }

    public function use(CombatantInterface $target = null): string
    {
        if ($target === null) {
            return "You can't use this on nothing! (Unlike JavaScript's 'undefined')";
        }

        $target->heal($this->healAmount);
        return "{$target->getName()} chugged the Stack Overflow Potion and restored {$this->healAmount} HP!";
    }
}
