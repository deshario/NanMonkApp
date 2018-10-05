<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Portfolio;

/**
 * PortfolioSearch represents the model behind the search form of `app\models\Portfolio`.
 */
class PortfolioSearch extends Portfolio
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['portfolio_id'], 'integer'],
            [['portfolio_name'], 'safe'],
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
        $query = Portfolio::find();

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
            'portfolio_id' => $this->portfolio_id,
        ]);

        $query->andFilterWhere(['like', 'portfolio_name', $this->portfolio_name]);

        return $dataProvider;
    }
}
