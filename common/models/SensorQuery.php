<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Sensor]].
 *
 * @see Sensor
 */
class SensorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Sensor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Sensor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
