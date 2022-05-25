<?php

/**
 * This file is part of the guanguans/yii-event.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\YiiEvent;

use Closure;
use Exception;
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
     * @param null                             $data
     * @param array|closure|object|string|null $listeners
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function dispatch(\yii\base\Event $event, $data = null, $listeners = null)
    {
        $listeners = $this->getListeners($event, $listeners);

        $this->onListeners($event, $data, $listeners);

        $this->trigger($event->name, $event);
    }

    /**
     * 获取事件全部监听.
     *
     * @param array|closure|object|string|null $listeners
     *
     * @return array
     */
    public function getListeners(\yii\base\Event $event, $listeners = null)
    {
        $listeners = is_object($listeners) ? [$listeners] : (array) $listeners;

        return array_unique(
            array_merge(
                isset($this->listen[get_class($event)]) ? $this->listen[get_class($event)] : [],
                $listeners
            )
        );
    }

    /**
     * 批量添加事件监听.
     *
     * @param null $data
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function onListeners(\yii\base\Event $event, $data = null, array $listeners)
    {
        foreach ($listeners as $listener) {
            if ($listener instanceof Closure || function_exists($listener)) {
                $this->on($event->name, $listener, $data);
                continue;
            }

            $listener = Yii::createObject($listener);
            if (! $listener instanceof ListenerInterface) {
                throw new Exception(sprintf('The %s muse be implement %s.', get_class($listener), ListenerInterface::class));
            }

            $this->on($event->name, [$listener, 'handle'], $data);
        }
    }
}
