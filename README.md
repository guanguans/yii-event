# yii-event

> Easily use events in yii. - 在 yii 中轻松容易的使用事件。

![Tests](https://github.com/guanguans/yii-event/workflows/Tests/badge.svg)
![Check & fix styling](https://github.com/guanguans/yii-event/workflows/Check%20&%20fix%20styling/badge.svg)
[![codecov](https://codecov.io/gh/guanguans/yii-event/branch/main/graph/badge.svg?token=URGFAWS6S4)](https://codecov.io/gh/guanguans/yii-event)
[![Latest Stable Version](https://poser.pugx.org/guanguans/yii-event/v)](//packagist.org/packages/guanguans/yii-event)
[![Total Downloads](https://poser.pugx.org/guanguans/yii-event/downloads)](//packagist.org/packages/guanguans/yii-event)
[![License](https://poser.pugx.org/guanguans/yii-event/license)](//packagist.org/packages/guanguans/yii-event)

## Requirement

* Yii > 2.0

## Installation

``` bash
$ composer require guanguans/yii-event -vvv
```

## Configuration

``` php

...

'components' => [
    'event' => [
        'class' => Guanguans\YiiEvent\Event::className(),
        'listen' => [
            \app\events\ExampleEvent::className() => [
                \app\listeners\ExampleListener::class,
            ],
        ],
    ],
],

...

```

## Usage

### Create `app\events\ExampleEvent.php` event

``` php
namespace app\events;

use yii\base\Event;

class ExampleEvent extends Event
{
    public $name = 'example';

    public $array;
}
```

### Create `app\listeners\ExampleListener.php` listener

``` php
namespace app\listeners;

use Guanguans\YiiEvent\ListenerInterface;
use yii\base\Event;

class ExampleListener implements ListenerInterface
{
    public static function handle(Event $event)
    {
        // to do something.
        var_export($event->array);
    }
}
```

### Dispatch event

``` php
Yii::$app->event->dispatch(new ExampleEvent(['array' => ['array']]));
// or
event(new ExampleEvent(['array' => ['array']]));
```

### Output result

``` php
array (
  0 => 'array',
)
```

## Testing

``` bash
$ composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

* [guanguans](https://github.com/guanguans)
* [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
