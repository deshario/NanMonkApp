<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Province;

/**
 * ProvinceSearch represents the model behind the search form of `app\models\Province`.
 */
class ProvinceSearch extends Province
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PROVINCE_ID', 'GEO_ID'], 'integer'],
            [['PROVINCE_CODE', 'PROVINCE_NAME'], 'safe'],
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
        $query = Province::find();

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
            'PROVINCE_ID' => $this->PROVINCE_ID,
            'GEO_ID' => $this->GEO_ID,
        ]);

        $query->andFilterWhere(['like', 'PROVINCE_CODE', $this->PROVINCE_CODE])
            ->andFilterWhere(['like', 'PROVINCE_NAME', $this->PROVINCE_NAME]);

        return $dataProvider;
    }
}
