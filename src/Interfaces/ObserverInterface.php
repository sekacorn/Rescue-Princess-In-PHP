<?php

namespace RescuePrincess\Interfaces;

/**
 * Observer pattern interface
 * Because enterprise code needs design patterns
 */
interface ObserverInterface
{
    public function update(string $event, array $data = []): void;
}
