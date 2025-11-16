<?php

namespace RescuePrincess\Interfaces;

use RescuePrincess\Items\Item;

/**
 * Interface for inventory management
 * Because you can't rescue a princess without a bag of holding
 */
interface InventoryInterface
{
    public function addItem(Item $item): void;
    public function removeItem(string $itemName): bool;
    public function hasItem(string $itemName): bool;
    public function getItem(string $itemName): ?Item;
    public function listItems(): array;
    public function useItem(string $itemName, CombatantInterface $target = null): void;
}
