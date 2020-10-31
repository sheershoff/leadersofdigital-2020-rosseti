<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[DeviceFingerprint]].
 *
 * @see DeviceFingerprint
 */
class DeviceFingerprintQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return DeviceFingerprint[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return DeviceFingerprint|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
