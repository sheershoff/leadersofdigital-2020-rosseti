<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[DeviceData]].
 *
 * @see DeviceData
 */
class DeviceDataQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return DeviceData[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return DeviceData|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
