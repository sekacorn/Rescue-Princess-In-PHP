<?php

namespace RescuePrincess\Interfaces;

/**
 * Subject pattern interface
 * Pairs perfectly with Observer like Laravel and Eloquent
 */
interface SubjectInterface
{
    public function attach(ObserverInterface $observer): void;
    public function detach(ObserverInterface $observer): void;
    public function notify(string $event, array $data = []): void;
}
