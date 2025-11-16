<?php

namespace RescuePrincess\Traits;

use RescuePrincess\Interfaces\ObserverInterface;

/**
 * Trait for observable subjects
 * Like watching your server logs during a production deploy
 */
trait Observable
{
    /** @var ObserverInterface[] */
    protected array $observers = [];

    public function attach(ObserverInterface $observer): void
    {
        $this->observers[] = $observer;
    }

    public function detach(ObserverInterface $observer): void
    {
        $this->observers = array_filter(
            $this->observers,
            fn($obs) => $obs !== $observer
        );
    }

    public function notify(string $event, array $data = []): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($event, $data);
        }
    }
}
