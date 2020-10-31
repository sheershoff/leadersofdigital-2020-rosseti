<?php

use yii\db\Migration;

/**
 * Class m201031_082225_add_table_sensor
 */
class m201031_082225_add_table_sensor extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sensor}}', [
            'id' => 'BIGINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT',
            'user_id' => 'INT',
            'name' => 'VARCHAR(255)',
            'address' => 'VARCHAR(255)',
            'created_at' => 'INT',
            'updated_at' => 'INT',
        ]);

        $this->addForeignKey('fk_sensor_user', '{{%sensor}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');

        $this->createTable('{{%device}}', [
            'id' => 'BIGINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT',
            'user_id' => 'INT',
            'name' => 'VARCHAR(255)',
            'address' => 'VARCHAR(255)',
            'created_at' => 'INT',
            'updated_at' => 'INT',
        ]);

        $this->addForeignKey('fk_device_user', '{{%device}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');

        $this->createTable('{{%sensor_data}}', [
            'sensor_id' => 'BIGINT UNSIGNED NOT NULL',
            'tstamp' => 'INT UNSIGNED NOT NULL',
            'consumed' => "FLOAT UNSIGNED NOT NULL COMMENT 'J = W*s'",
            'i' => "FLOAT NOT NULL COMMENT 'A'",
            'cos_phi' => "FLOAT NOT NULL",
            'noise_50' => "FLOAT NOT NULL",
            'noise_100' => "FLOAT NOT NULL",
            'noise_200' => "FLOAT NOT NULL",
            'noise_400' => "FLOAT NOT NULL",
            'noise_800' => "FLOAT NOT NULL",
        ]);

        $this->addPrimaryKey('pk_sensordata', '{{%sensor_data}}', ['sensor_id', 'tstamp']);

        $this->addForeignKey('fk_sensordata_sensor', '{{%sensor_data}}', 'sensor_id', '{{%sensor}}', 'id', 'CASCADE', 'CASCADE');

        $this->createTable('{{%device_data}}', [
            'device_id' => 'BIGINT UNSIGNED NOT NULL',
            'tstamp' => 'INT UNSIGNED NOT NULL',
            'sensor_id' => 'BIGINT UNSIGNED NOT NULL',
            'consumed' => "FLOAT UNSIGNED NOT NULL COMMENT 'J = W*s'",
        ]);

        $this->addPrimaryKey('pk_devicedata', '{{%device_data}}', ['device_id', 'tstamp']);

        $this->addForeignKey('fk_devicedata_device', '{{%device_data}}', 'device_id', '{{%device}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_devicedata_sensor', '{{%device_data}}', 'sensor_id', '{{%sensor}}', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201031_082225_add_table_sensor cannot be reverted.\n";

        return false;
    }
}
