<?php

require __DIR__ . '/../vendor/autoload.php';

// NOTE: Make sure this file is not accessible when deployed to production
if (!env('YII_DEBUG')) {
    die('You are not allowed to access this file.');
}

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'test');

require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/test.php';

(new yii\web\Application($config))->run();
