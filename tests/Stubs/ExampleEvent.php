<?php

/**
 * This file is part of the guanguans/yii-event.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\YiiEvent\Tests\Stubs;

use yii\base\Event;

class ExampleEvent extends Event
{
    public $name = 'example';

    public $foo;
}
