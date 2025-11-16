<?php

namespace RescuePrincess\Items;

use RescuePrincess\Interfaces\CombatantInterface;

/**
 * Composer Install Scroll
 * Summons dependencies to aid you
 */
class ComposerInstall extends Item
{
    public function __construct()
    {
        parent::__construct(
            'Composer Install Scroll',
            'A magical scroll that runs composer install. Fully heals you by installing the "heal" package.'
        );
    }

    public function use(CombatantInterface $target = null): string
    {
        if ($target === null) {
            return "You need a target to use this on!";
        }

        // Full heal
        $healAmount = $target->getMaxHealth() - $target->getHealth();
        $target->heal($healAmount);

        $output = "📦 Running composer install...\n";
        $output .= "   Loading composer repositories with package information\n";
        $output .= "   Installing dependencies (including require-dev)\n";
        $output .= "   - Installing symfony/heal (v4.20.0)\n";
        $output .= "   Generating autoload files\n";
        $output .= "   🎉 {$target->getName()} was fully healed!";

        return $output;
    }
}
