<?php

$config = [
    'class' => 'yii\db\Connection',
    'dsn' => env('DB_DSN'),
    'username' => env('DB_USERNAME'),
    'password' => env('DB_PASSWORD'),
    'tablePrefix' => getenv('DB_TABLE_PREFIX'),
    'charset' => 'utf8',
];

if(!env('YII_DEBUG'))
{
    $config['enableSchemaCache'] = true;
    $config['schemaCacheDuration'] = 60;
    $config['schemaCache'] = 'cache';
}

return $config;