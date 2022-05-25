<?php

/**
 * This file is part of the guanguans/yii-event.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\YiiEvent\Tests;

use Exception;
use Guanguans\YiiEvent\ListenerInterface;
use Guanguans\YiiEvent\Tests\Stubs\ExampleEvent;
use Yii;
use yii\web\Application;

class EventTest extends TestCase
{
    public function testGetListen()
    {
        $this->assertIsArray(Yii::$app->event->getListen());
    }

    public function testSetListen()
    {
        $mockArr = ['array'];
        Yii::$app->event->setListen($mockArr);

        $this->assertEquals($mockArr, Yii::$app->event->getListen());
    }

    public function testDispatchException()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage(sprintf('The %s muse be implement %s.', self::class, ListenerInterface::class));

        Yii::$app->event->dispatch(new ExampleEvent(), null, self::class);
    }

    public function testDispatch()
    {
        $mockArr = ['array'];

        $this->assertNull(Yii::$app->event->dispatch(new ExampleEvent(['data' => $mockArr])));
        $this->assertNull(Yii::$app->event->dispatch(new ExampleEvent(['data' => $mockArr]), null, function () {
            return 'To do something.';
        }));
    }

    public function testDispatchOutputString()
    {
        $config = [
            'id' => 'yii2-event-app',
            'basePath' => dirname(__DIR__),
            'components' => [
                'event' => [
                    'class' => \Guanguans\YiiEvent\Event::class,
                    'listen' => [
                        \Guanguans\YiiEvent\Tests\Stubs\ExampleEvent::class => [
                            \Guanguans\YiiEvent\Tests\Stubs\ExampleListener::class,
                        ],
                    ],
                ],
            ],
        ];

        new Application($config);

        $mockArr = ['mock_arr'];

        $this->expectOutputString(var_export($mockArr, true));

        Yii::$app->event->dispatch(new ExampleEvent(['array' => $mockArr]));
        // event(new ExampleEvent(['array' => $mockArr]));
    }
}
