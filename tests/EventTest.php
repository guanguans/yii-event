<?php

/**
 * This file is part of the guanguans/yii-event.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\YiiEvent\Tests;

use Guanguans\YiiEvent\ListenerInterface;
use Guanguans\YiiEvent\Tests\Stubs\ExampleEvent;
use InvalidArgumentException;
use Yii;
use yii\base\InvalidConfigException;

class EventTest extends TestCase
{
    public function testGetListen()
    {
        $this->assertIsArray(Yii::$app->event->getListen());
    }

    public function testSetListen()
    {
        Yii::$app->event->setListen($mockArr = ['array']);
        $this->assertEquals($mockArr, Yii::$app->event->getListen());
    }

    public function testDispatchInvalidArgumentException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(sprintf('The %s muse be implement %s.', self::class, ListenerInterface::class));
        Yii::$app->event->dispatch(new ExampleEvent(), null, self::class);
    }

    public function testDispatchInvalidConfigException()
    {
        $this->expectException(InvalidConfigException::class);
        Yii::$app->event->dispatch(new ExampleEvent(), null, \yii\base\Application::class);
    }

    public function testDispatch()
    {
        $this->expectOutputString(var_export($foo = 'foo', true));
        $this->assertNull(Yii::$app->event->dispatch(new ExampleEvent(['foo' => $foo])));

        $this->expectOutputString(var_export($bar = 'bar', true));
        Yii::$app->event->dispatch(new ExampleEvent(), $bar, function ($event) {
            var_export($event->data);
        });
    }
}
