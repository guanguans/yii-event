<?php

/*
 * This file is part of the guanguans/yii-event.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\YiiEvent\Tests;

use Guanguans\YiiEvent\Tests\Stub\ExampleEvent;
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

    public function testDispatch()
    {
        $mockArr = ['array'];

        $this->assertNull(Yii::$app->event->dispatch(new ExampleEvent(['data' => $mockArr])));
    }

    public function testDispatchOutputString()
    {
        $config = [
            'id' => 'yii2-event-app',
            'basePath' => dirname(__DIR__),
            'components' => [
                'event' => [
                    'class' => \Guanguans\YiiEvent\Event::className(),
                    'listen' => [
                        \Guanguans\YiiEvent\Tests\Stub\ExampleEvent::className() => [
                            \Guanguans\YiiEvent\Tests\Stub\ExampleListener::class,
                        ],
                    ],
                ],
            ],
        ];

        new Application($config);

        $mockArr = ['mock_arr'];

        $this->expectOutputString(var_export($mockArr, true));

        Yii::$app->event->dispatch(new ExampleEvent(['array' => $mockArr]));
    }
}
