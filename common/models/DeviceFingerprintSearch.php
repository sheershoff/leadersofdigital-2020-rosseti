<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DeviceFingerprint;

/**
 * DeviceFingerprintSearch represents the model behind the search form of `\common\models\DeviceFingerprint`.
 */
class DeviceFingerprintSearch extends DeviceFingerprint
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'device_id'], 'integer'],
            [['consumed', 'i', 'cos_phi', 'noise_50', 'noise_100', 'noise_200', 'noise_400', 'noise_800'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = DeviceFingerprint::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'device_id' => $this->device_id,
            'consumed' => $this->consumed,
            'i' => $this->i,
            'cos_phi' => $this->cos_phi,
            'noise_50' => $this->noise_50,
            'noise_100' => $this->noise_100,
            'noise_200' => $this->noise_200,
            'noise_400' => $this->noise_400,
            'noise_800' => $this->noise_800,
        ]);

        return $dataProvider;
    }
}
