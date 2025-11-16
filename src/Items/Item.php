<?php

namespace RescuePrincess\Items;

use RescuePrincess\Interfaces\CombatantInterface;

/**
 * Abstract base class for all items
 * Because every RPG needs loot
 */
abstract class Item
{
    protected string $name;
    protected string $description;

    public function __construct(string $name, string $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    abstract public function use(CombatantInterface $target = null): string;
}
