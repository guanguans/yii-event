<?php

/**
 * This file is part of the guanguans/yii-event.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

class Yii
{
    /**
     * @var Application
     */
    public static $app;
}

/**
 * @property \Guanguans\YiiEvent\Event $event
 */
class Application extends \yii\web\Application
{
}
