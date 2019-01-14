<?php

use yii\db\Migration;

/**
 * Class m190112_195425_alter_table_users
 */
class m190112_195425_alter_table_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /*Yii::$app->db->createCommand("
        ALTER TABLE users DROP FOREIGN KEY user_id
        ");
        */
        $this->dropForeignKey('user_id', 'users');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190112_195425_alter_table_users cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190112_195425_alter_table_users cannot be reverted.\n";

        return false;
    }
    */
}
