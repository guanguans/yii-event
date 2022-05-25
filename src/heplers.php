<?php

/**
 * This file is part of the guanguans/yii-event.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

use yii\base\Event;

if (! function_exists('event')) {
    /**
     * 调度事件.
     *
     * @param mixed               $data
     * @param callable|callable[] $listeners
     *
     * @throws \yii\base\InvalidConfigException
     * @throws \InvalidArgumentException
     */
    function event(Event $event, $data = null, $listeners = null)
    {
        return Yii::$app->event->dispatch($event, $data, $listeners);
    }
}
