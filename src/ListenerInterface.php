<?php

/**
 * This file is part of the guanguans/yii-event.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\YiiEvent;

use yii\base\Event;

interface ListenerInterface
{
    /**
     * Event handle.
     *
     * @return mixed
     */
    public function handle(Event $event);
}
