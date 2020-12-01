<?php

use yii\db\Migration;

/**
 * Class m201129_173837_add_new_colomn_for_2fa
 */
class m201129_173837_add_new_colomn_for_2fa extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'totp_secret', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'totp_secret');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201129_173837_add_new_colomn_for_2fa cannot be reverted.\n";

        return false;
    }
    */
}
