<?php

/*
 * This file is part of the guanguans/yii-event.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

use Guanguans\YiiEvent\Event;

$config = [
    'id' => 'yii2-event-app',
    'basePath' => dirname(__DIR__),
    'components' => [
        'event' => [
            'class' => Event::className(),
            'listen' => [
                \Guanguans\YiiEvent\Tests\Stub\ExampleEvent::className() => [
                    \Guanguans\YiiEvent\Tests\Stub\ExampleListener::class,
                ],
            ],
        ],
    ],
];

return $config;
