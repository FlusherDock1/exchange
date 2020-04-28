<?php

declare(strict_types=1);

namespace Tests;

use Jurager\Exchange1C\Interfaces\EventDispatcherInterface;
use Jurager\Exchange1C\Interfaces\EventInterface;
use Jurager\Exchange\LaravelEventDispatcher;

class LaravelEventDispatcherTest extends TestCase
{
    public function testDispatch():void
    {
        $dispatcher = $this->makeDispatcher();
        $event = $this->createMock(EventInterface::class);
        $this->assertNull($dispatcher->dispatch($event));
    }

    /**
     * @return LaravelEventDispatcher
     */
    private function makeDispatcher(): LaravelEventDispatcher
    {
        return $this->app->make(EventDispatcherInterface::class);
    }
}
