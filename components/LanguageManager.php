<?php
/**
 * Created by PhpStorm.
 * User: Rikipm
 * Date: 27.06.2019
 * Time: 23:12
 */

namespace app\components;

use yii\base\Component;
use Yii;

/**
 * Class LanguageManager
 * Manager for changing language in app
 *
 * @package app\components
 */
class LanguageManager extends Component
{
    public $allowedLanguages = ['en-US'];
    public function init()
    {
        if(!Yii::$app->user->isGuest)
            Yii::$app->language = Yii::$app->user->identity->locale;
    }
}