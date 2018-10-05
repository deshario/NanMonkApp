<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Address;

/**
 * AddressSearch represents the model behind the search form of `app\models\Address`.
 */
class AddressSearch extends Address
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address_id'], 'integer'],
            [['home_no', 'tambol', 'amphur', 'province', 'zipcode'], 'safe'],
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
        $query = Address::find();

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
            'address_id' => $this->address_id,
        ]);

        $query->andFilterWhere(['like', 'home_no', $this->home_no])
            ->andFilterWhere(['like', 'tambol', $this->tambol])
            ->andFilterWhere(['like', 'amphur', $this->amphur])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'zipcode', $this->zipcode]);

        return $dataProvider;
    }
}
