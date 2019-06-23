<?php

use app\models\User;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m190610_170428_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
            'auth_key' => $this->string()->notNull(),
            'status' => $this->boolean()->notNull(),
            'locale' => $this->string()->notNull(),
            'theme' => $this->string()->notNull(),
            'logged_at' => $this->timestamp()->defaultValue(NULL), //DefaultValue is crutch because Yii automatically add ON UPDATE CURRENT_TIMESTAMP to first timestamp column in table

            'created_at' => $this->timestamp()->notNull(),
            'updated_at' => $this->timestamp()->notNull(),
        ]);

        $admin = new User();
        $admin->username = 'admin';
        $admin->password = Yii::$app->getSecurity()->generatePasswordHash('admin');
        if(!$admin->save())
        {
            throw new \yii\db\Exception('Cant create admin account('.$admin->getErrorSummary(true)[0].')');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
