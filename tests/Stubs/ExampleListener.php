<?php

/**
 * This file is part of the guanguans/yii-event.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\YiiEvent\Tests\Stubs;

use Guanguans\YiiEvent\ListenerInterface;
use yii\base\Event;

class ExampleListener implements ListenerInterface
{
    public function handle(Event $event)
    {
        var_export($event->foo);
    }
}
