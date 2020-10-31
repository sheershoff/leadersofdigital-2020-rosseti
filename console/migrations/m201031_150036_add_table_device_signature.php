<?php

use yii\db\Migration;

/**
 * Class m201031_150036_add_table_device_signature
 */
class m201031_150036_add_table_device_signature extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%device_fingerprint}}', [
            'id' => 'BIGINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT',
            'device_id' => 'BIGINT UNSIGNED NOT NULL',
            'consumed' => "FLOAT UNSIGNED NOT NULL COMMENT 'J = W*s'",
            'i' => "FLOAT NOT NULL COMMENT 'A'",
            'cos_phi' => "FLOAT NOT NULL",
            'noise_50' => "FLOAT NOT NULL",
            'noise_100' => "FLOAT NOT NULL",
            'noise_200' => "FLOAT NOT NULL",
            'noise_400' => "FLOAT NOT NULL",
            'noise_800' => "FLOAT NOT NULL",
        ]);

        $this->addForeignKey('fk_devicefingerprint_device', '{{%device_fingerprint}}', 'device_id', '{{%device}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201031_150036_add_table_device_signature cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201031_150036_add_table_device_signature cannot be reverted.\n";

        return false;
    }
    */
}
