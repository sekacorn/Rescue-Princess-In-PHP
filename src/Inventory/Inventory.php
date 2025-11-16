<?php

namespace RescuePrincess\Inventory;

use RescuePrincess\Interfaces\InventoryInterface;
use RescuePrincess\Interfaces\CombatantInterface;
use RescuePrincess\Items\Item;

/**
 * Inventory management class
 * Implemented with an associative array because this is PHP, baby!
 */
class Inventory implements InventoryInterface
{
    /** @var Item[] */
    private array $items = [];

    public function addItem(Item $item): void
    {
        $this->items[$item->getName()] = $item;
    }

    public function removeItem(string $itemName): bool
    {
        if (isset($this->items[$itemName])) {
            unset($this->items[$itemName]);
            return true;
        }
        return false;
    }

    public function hasItem(string $itemName): bool
    {
        return isset($this->items[$itemName]);
    }

    public function getItem(string $itemName): ?Item
    {
        return $this->items[$itemName] ?? null;
    }

    public function listItems(): array
    {
        return $this->items;
    }

    public function useItem(string $itemName, CombatantInterface $target = null): void
    {
        $item = $this->getItem($itemName);
        if ($item) {
            echo $item->use($target) . PHP_EOL;
            // Some items are consumable, remove them after use
            if (get_class($item) === 'RescuePrincess\Items\HealthPotion') {
                $this->removeItem($itemName);
            }
        } else {
            echo "You don't have that item! (404 Item Not Found)" . PHP_EOL;
        }
    }
}
