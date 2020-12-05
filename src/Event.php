<?php

/*
 * This file is part of the guanguans/yii-event.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\YiiEvent;

use Closure;
use Yii;
use yii\base\Component;

class Event extends Component
{
    /**
     * @var array
     */
    protected $listen = [];

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @return array
     */
    public function getListen()
    {
        return $this->listen;
    }

    public function setListen(array $listen)
    {
        $this->listen = $listen;
    }

    /**
     * 调度事件.
     *
     * @param array|closure|object|string|null $listeners
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function dispatch(\yii\base\Event $event, $listeners = null)
    {
        $listeners = is_object($listeners) ? [$listeners] : (array) $listeners;

        $listeners = array_unique(array_merge(
            isset($this->listen[get_class($event)]) ? $this->listen[get_class($event)] : [],
            $listeners
        ));

        foreach ($listeners as $listener) {
            is_string($listener) && $listener = Yii::createObject($listener);
            $listener instanceof Closure && $this->on($event->name, $listener);
            $listener instanceof ListenerInterface && $this->on($event->name, [$listener, 'handle']);
        }

        $this->trigger($event->name, $event);
    }
}
