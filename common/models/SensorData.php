<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%sensor_data}}".
 *
 * @property int $sensor_id
 * @property int $tstamp
 * @property float $consumed J = W*s
 * @property float $i A
 * @property float $cos_phi
 * @property float $noise_50
 * @property float $noise_100
 * @property float $noise_200
 * @property float $noise_400
 * @property float $noise_800
 *
 * @property Sensor $sensor
 */
class SensorData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%sensor_data}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sensor_id', 'tstamp', 'consumed', 'i', 'cos_phi', 'noise_50', 'noise_100', 'noise_200', 'noise_400', 'noise_800'], 'required'],
            [['sensor_id', 'tstamp'], 'integer'],
            [['consumed', 'i', 'cos_phi', 'noise_50', 'noise_100', 'noise_200', 'noise_400', 'noise_800'], 'number'],
            [['sensor_id', 'tstamp'], 'unique', 'targetAttribute' => ['sensor_id', 'tstamp']],
            [['sensor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sensor::className(), 'targetAttribute' => ['sensor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sensor_id' => Yii::t('app', 'Sensor ID'),
            'tstamp' => Yii::t('app', 'Tstamp'),
            'consumed' => Yii::t('app', 'J = W*s'),
            'i' => Yii::t('app', 'A'),
            'cos_phi' => Yii::t('app', 'Cos Phi'),
            'noise_50' => Yii::t('app', 'Noise 50'),
            'noise_100' => Yii::t('app', 'Noise 100'),
            'noise_200' => Yii::t('app', 'Noise 200'),
            'noise_400' => Yii::t('app', 'Noise 400'),
            'noise_800' => Yii::t('app', 'Noise 800'),
        ];
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
     * @return SensorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SensorQuery(get_called_class());
    }
}
