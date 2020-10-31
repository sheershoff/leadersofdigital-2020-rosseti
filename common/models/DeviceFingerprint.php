<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%device_fingerprint}}".
 *
 * @property int $id
 * @property int $device_id
 * @property float $consumed J = W*s
 * @property float $i A
 * @property float $cos_phi
 * @property float $noise_50
 * @property float $noise_100
 * @property float $noise_200
 * @property float $noise_400
 * @property float $noise_800
 *
 * @property Device $device
 */
class DeviceFingerprint extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%device_fingerprint}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['device_id', 'consumed', 'i', 'cos_phi', 'noise_50', 'noise_100', 'noise_200', 'noise_400', 'noise_800'], 'required'],
            [['device_id'], 'integer'],
            [['consumed', 'i', 'cos_phi', 'noise_50', 'noise_100', 'noise_200', 'noise_400', 'noise_800'], 'number'],
            [['device_id'], 'exist', 'skipOnError' => true, 'targetClass' => Device::className(), 'targetAttribute' => ['device_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'device_id' => Yii::t('app', 'Device ID'),
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
     * Gets query for [[Device]].
     *
     * @return \yii\db\ActiveQuery|DeviceQuery
     */
    public function getDevice()
    {
        return $this->hasOne(Device::className(), ['id' => 'device_id']);
    }

    /**
     * {@inheritdoc}
     * @return DeviceFingerprintQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DeviceFingerprintQuery(get_called_class());
    }
}
