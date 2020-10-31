<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%device_data}}".
 *
 * @property int $device_id
 * @property int $tstamp
 * @property int $sensor_id
 * @property float $consumed J = W*s
 *
 * @property Device $device
 * @property Sensor $sensor
 */
class DeviceData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%device_data}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['device_id', 'tstamp', 'sensor_id', 'consumed'], 'required'],
            [['device_id', 'tstamp', 'sensor_id'], 'integer'],
            [['consumed'], 'number'],
            [['device_id', 'tstamp'], 'unique', 'targetAttribute' => ['device_id', 'tstamp']],
            [['device_id'], 'exist', 'skipOnError' => true, 'targetClass' => Device::className(), 'targetAttribute' => ['device_id' => 'id']],
            [['sensor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sensor::className(), 'targetAttribute' => ['sensor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'device_id' => Yii::t('app', 'Device ID'),
            'tstamp' => Yii::t('app', 'Tstamp'),
            'sensor_id' => Yii::t('app', 'Sensor ID'),
            'consumed' => Yii::t('app', 'J = W*s'),
        ];
    }

    /**
     * Gets query for [[Device]].
     *
     * @return \yii\db\ActiveQuery|DeviceQuery
     */
    public function getDevice()
    {
        return $this->hasOne(Device::className(), ['id' => 'device_id']);
    }

    /**
     * Gets query for [[Sensor]].
     *
     * @return \yii\db\ActiveQuery|SensorQuery
     */
    public function getSensor()
    {
        return $this->hasOne(Sensor::className(), ['id' => 'sensor_id']);
    }

    /**
     * {@inheritdoc}
     * @return DeviceDataQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DeviceDataQuery(get_called_class());
    }
}
