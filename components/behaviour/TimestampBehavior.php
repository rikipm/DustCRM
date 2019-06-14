<?php

namespace app\components\behaviour;

use yii\db\Expression;

/**
 * Created by PhpStorm.
 * User: Rikipm
 * Date: 13.06.2019
 * Time: 15:26
 *
 * Its modified TimestampBehaviour that created for use with date-type columns (timestamp, datetime etc). Standart TimestampBehaviour can work only with int columns if you dont specify value
 */

class TimestampBehavior extends \yii\behaviors\TimestampBehavior
{
    function __construct(array $config = [])
    {
        parent::__construct($config);

        $this->value = new Expression('NOW()');
    }
}