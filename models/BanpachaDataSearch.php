<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BanpachaData;

/**
 * BanpachaDataSearch represents the model behind the search form of `app\models\BanpachaData`.
 */
class BanpachaDataSearch extends BanpachaData
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['banpacha_id', 'banpacha_address', 'woopatcha_address'], 'integer'],
            [['banpacha_temple', 'banpacha_date', 'woopatcha_by', 'woopatcha_temple'], 'safe'],
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
        $query = BanpachaData::find();

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
            'banpacha_id' => $this->banpacha_id,
            'banpacha_date' => $this->banpacha_date,
            'banpacha_address' => $this->banpacha_address,
            'woopatcha_address' => $this->woopatcha_address,
        ]);

        $query->andFilterWhere(['like', 'banpacha_temple', $this->banpacha_temple])
            ->andFilterWhere(['like', 'woopatcha_by', $this->woopatcha_by])
            ->andFilterWhere(['like', 'woopatcha_temple', $this->woopatcha_temple]);

        return $dataProvider;
    }
}
