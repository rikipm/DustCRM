<?php
/**
 * Created by PhpStorm.
 * User: Rikipm
 * Date: 21.08.2019
 * Time: 5:02
 */

namespace app\modules\inventory\models;


use yii\db\ActiveRecord;

class Storage extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%storage%}}';
    }
}