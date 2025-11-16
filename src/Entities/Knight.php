<?php

namespace RescuePrincess\Entities;

use RescuePrincess\Interfaces\InventoryInterface;
use RescuePrincess\Inventory\Inventory;

/**
 * The brave Knight
 * Your avatar in this over-engineered quest
 */
class Knight extends AbstractCombatant
{
    private InventoryInterface $inventory;
    private int $level = 1;
    private int $experience = 0;

    public function __construct()
    {
        parent::__construct('Sir PHP Developer', 100);
        $this->inventory = new Inventory();
    }

    public function getInventory(): InventoryInterface
    {
        return $this->inventory;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function gainExperience(int $amount): void
    {
        $this->experience += $amount;
        echo "💎 Gained {$amount} EXP!" . PHP_EOL;

        // Level up every 100 XP
        while ($this->experience >= 100) {
            $this->levelUp();
            $this->experience -= 100;
        }
    }

    private function levelUp(): void
    {
        $this->level++;
        $this->maxHealth += 20;
        $this->health = $this->maxHealth;
        echo "🎉 LEVEL UP! You are now level {$this->level}!" . PHP_EOL;
        echo "✨ Max HP increased to {$this->maxHealth}!" . PHP_EOL;
    }

    public function showStats(): void
    {
        echo "\n" . str_repeat("=", 50) . PHP_EOL;
        echo "⚔️  KNIGHT STATUS" . PHP_EOL;
        echo str_repeat("=", 50) . PHP_EOL;
        echo "Name: {$this->name}" . PHP_EOL;
        echo "Level: {$this->level}" . PHP_EOL;
        echo "HP: {$this->health}/{$this->maxHealth}" . PHP_EOL;
        echo "XP: {$this->experience}/100" . PHP_EOL;

        $items = $this->inventory->listItems();
        echo "\n📦 Inventory (" . count($items) . " items):" . PHP_EOL;
        if (empty($items)) {
            echo "  - Empty (like your promises to refactor)" . PHP_EOL;
        } else {
            foreach ($items as $item) {
                echo "  - {$item->getName()}" . PHP_EOL;
            }
        }
        echo str_repeat("=", 50) . "\n" . PHP_EOL;
    }
}
