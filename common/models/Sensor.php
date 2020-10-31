<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%sensor}}".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $name
 * @property string|null $address
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property DeviceData[] $deviceDatas
 * @property User $user
 * @property SensorData[] $sensorDatas
 */
class Sensor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%sensor}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'created_at', 'updated_at'], 'integer'],
            [['name', 'address'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'name' => Yii::t('app', 'Name'),
            'address' => Yii::t('app', 'Address'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[DeviceDatas]].
     *
     * @return \yii\db\ActiveQuery|DeviceDataQuery
     */
    public function getDeviceDatas()
    {
        return $this->hasMany(DeviceData::className(), ['sensor_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[SensorDatas]].
     *
     * @return \yii\db\ActiveQuery|SensorDataQuery
     */
    public function getSensorDatas()
    {
        return $this->hasMany(SensorData::className(), ['sensor_id' => 'id']);
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
