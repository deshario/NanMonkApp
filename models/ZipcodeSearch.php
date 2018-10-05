<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Zipcode;

/**
 * ZipcodeSearch represents the model behind the search form of `app\models\Zipcode`.
 */
class ZipcodeSearch extends Zipcode
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ZIPCODE_ID'], 'integer'],
            [['DISTRICT_CODE', 'PROVINCE_ID', 'AMPHUR_ID', 'DISTRICT_ID', 'ZIPCODE'], 'safe'],
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
        $query = Zipcode::find();

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
            'ZIPCODE_ID' => $this->ZIPCODE_ID,
        ]);

        $query->andFilterWhere(['like', 'DISTRICT_CODE', $this->DISTRICT_CODE])
            ->andFilterWhere(['like', 'PROVINCE_ID', $this->PROVINCE_ID])
            ->andFilterWhere(['like', 'AMPHUR_ID', $this->AMPHUR_ID])
            ->andFilterWhere(['like', 'DISTRICT_ID', $this->DISTRICT_ID])
            ->andFilterWhere(['like', 'ZIPCODE', $this->ZIPCODE]);

        return $dataProvider;
    }
}
