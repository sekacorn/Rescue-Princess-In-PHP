<?php

namespace RescuePrincess\Traits;

/**
 * Trait for entities with health
 * DRY principle in action! Don't Repeat Yourself (but do repeat this trait everywhere)
 */
trait HasHealth
{
    protected int $health;
    protected int $maxHealth;

    public function getHealth(): int
    {
        return $this->health;
    }

    public function getMaxHealth(): int
    {
        return $this->maxHealth;
    }

    public function takeDamage(int $damage): void
    {
        $this->health = max(0, $this->health - $damage);

        if ($this->health <= 0) {
            $this->onDeath();
        }
    }

    public function heal(int $amount): void
    {
        $this->health = min($this->maxHealth, $this->health + $amount);
    }

    public function isAlive(): bool
    {
        return $this->health > 0;
    }

    /**
     * Override this in your class to handle death
     * Like your dreams of writing clean code
     */
    protected function onDeath(): void
    {
        // Override in subclass
    }
}
