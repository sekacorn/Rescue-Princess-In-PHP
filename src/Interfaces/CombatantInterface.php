<?php

namespace RescuePrincess\Interfaces;

/**
 * Interface for all entities that can engage in combat
 * Because even princesses might know kung-fu
 */
interface CombatantInterface
{
    public function attack(CombatantInterface $target): int;
    public function takeDamage(int $damage): void;
    public function heal(int $amount): void;
    public function isAlive(): bool;
    public function getHealth(): int;
    public function getMaxHealth(): int;
    public function getName(): string;
}
