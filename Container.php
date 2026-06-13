<?php

namespace Roots\Sage;

use Illuminate\Container\Container as BaseContainer;

class Container extends BaseContainer
{
    /**
     * illuminate/view v13 registers end-of-request Blade cache flush callbacks
     * via terminating(). WordPress has no Application lifecycle, so we hook them
     * onto the 'shutdown' action instead — the closest WordPress equivalent.
     */
    public function terminating(callable|array $callback): static
    {
        add_action('shutdown', $callback);
        return $this;
    }
}
