<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use Yii;
use yii\behaviors\AttributeBehavior;
use app\components\behaviour\TimestampBehavior;

class User extends ActiveRecord implements IdentityInterface
{
    const STATUS = ['active' => 1, 'inactive' => 0];

    public $new_password;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'boolean'],
            [['username', 'new_password'], 'string', 'max' => 255],

            ['username', 'required'],
            ['username', 'unique'],

            ['new_password', 'required', 'on' => 'create'],
            ['new_password', 'string', 'min' => 6],

            ['locale', 'default', 'value' => 'en-US'],
            ['theme', 'default', 'value' => 'skin-blue'],
            ['status', 'default', 'value' => self::STATUS['active']],
            [['new_password'], 'safe'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'auth_key'
                ],
                'value' => Yii::$app->getSecurity()->generateRandomString()
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'Username'),
            'new_password' => Yii::t('app', 'Password'),
            'status' => Yii::t('app', 'Status'),
            'locale' => Yii::t('app', 'Locale'),
            'theme' => Yii::t('app', 'Theme'),
            'created_at' => Yii::t('app', 'Created at'),
            'updated_at' => Yii::t('app', 'Updated at'),
            'logged_at' => Yii::t('app', 'Last login'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['auth_key' => $token, 'status' => self::STATUS['active']]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS['active']]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($auth_key)
    {
        return $this->getAuthKey() === $auth_key;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = Yii::$app->getSecurity()->generatePasswordHash($password);
    }

   /**
    * {@inheritdoc}
    */
    public function beforeSave($insert)
    {
        if(!empty($this->new_password))
        {
            $this->setPassword($this->new_password);
        }
        return parent::beforeSave($insert);
    }
}
