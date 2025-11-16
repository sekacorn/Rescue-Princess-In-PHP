<?php

namespace RescuePrincess\Entities;

use RescuePrincess\Interfaces\CombatantInterface;
use RescuePrincess\Interfaces\SubjectInterface;
use RescuePrincess\Traits\HasHealth;
use RescuePrincess\Traits\Observable;
use RescuePrincess\Strategy\AttackStrategy;
use RescuePrincess\Strategy\NormalAttack;

/**
 * Abstract base class for all combatants
 * More abstract than modern art
 */
abstract class AbstractCombatant implements CombatantInterface, SubjectInterface
{
    use HasHealth, Observable;

    protected string $name;
    protected AttackStrategy $attackStrategy;

    public function __construct(string $name, int $health)
    {
        $this->name = $name;
        $this->health = $health;
        $this->maxHealth = $health;
        $this->attackStrategy = new NormalAttack(); // Default strategy
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setAttackStrategy(AttackStrategy $strategy): void
    {
        $this->attackStrategy = $strategy;
    }

    public function attack(CombatantInterface $target): int
    {
        $result = $this->attackStrategy->execute($this, $target);
        $this->notify('attack', $result);
        return $result['damage'];
    }

    protected function onDeath(): void
    {
        $this->notify('death', ['combatant' => $this->name]);
    }
}
