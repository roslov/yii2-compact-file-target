CompactFileTarget
=================

Ignores traces in FileTarget log.

Even if `traceLevel` is set greater than 0, the trace data will not be written to a log file.

This is needed to have more clean logs on development environment.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist roslov/yii2-compact-file-target "*"
```

or add

```
"roslov/yii2-compact-file-target": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

Let’s imagine you have such configuration:

```php
return [
    'bootstrap' => ['log'],
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['info'],
                    'categories' => ['analytics'],
                    'logVars' => [],
                ],
            ],
        ],
    ],
];
```

After `Yii::info($text, 'analytics');` your log will have such output:

```
2017-10-30 12:11:41 [172.18.0.1][43][-][info][analytics] User 123 updated.
    in /var/www/html/components/analytics/Analytics.php:110
    in /var/www/html/components/analytics/Analytics.php:75
    in /var/www/html/modules/api/v2/behaviors/EventTracker.php:40
2017-10-30 12:11:42 [172.18.0.1][43][-][info][analytics] Notification sent to user 123.
    in /var/www/html/components/analytics/Analytics.php:110
    in /var/www/html/components/analytics/Analytics.php:75
    in /var/www/html/modules/api/v2/behaviors/ActivityTracker.php:85
2017-10-30 12:11:55 [172.18.0.1][43][-][info][analytics] User 456 logged out.
    in /var/www/html/components/analytics/Analytics.php:110
    in /var/www/html/components/analytics/Analytics.php:41
    in /var/www/html/modules/api/v2/behaviors/ActivityTracker.php:57
```

For just logging events you may not need any trace information.

So you can change `class` from `yii\log\FileTarget` to `roslov\log\CompactFileTarget`:

```php
return [
    'bootstrap' => ['log'],
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'roslov\log\CompactFileTarget',
                    'levels' => ['info'],
                    'categories' => ['analytics'],
                    'logVars' => [],
                ],
            ],
        ],
    ],
];
```

In this case the log will look more clean.

```
2017-10-30 12:11:41 [172.18.0.1][43][-][info][analytics] User 123 updated.
2017-10-30 12:11:42 [172.18.0.1][43][-][info][analytics] Notification sent to user 123.
2017-10-30 12:11:55 [172.18.0.1][43][-][info][analytics] User 456 logged out.
```
