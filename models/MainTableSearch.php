<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MainTable;

/**
 * MainTableSearch represents the model behind the search form of `app\models\MainTable`.
 */
class MainTableSearch extends MainTable
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['main_id', 'user_id', 'current_id', 'banpacha_id', 'woopasombod_id', 'champhansa_id', 'education_id', 'rank_id', 'samanasak_id', 'training_id', 'talent_id', 'portfolio_id'], 'integer'],
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
        $query = MainTable::find();

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
            'main_id' => $this->main_id,
            'user_id' => $this->user_id,
            'current_id' => $this->current_id,
            'banpacha_id' => $this->banpacha_id,
            'woopasombod_id' => $this->woopasombod_id,
            'champhansa_id' => $this->champhansa_id,
            'education_id' => $this->education_id,
            'rank_id' => $this->rank_id,
            'samanasak_id' => $this->samanasak_id,
            'training_id' => $this->training_id,
            'talent_id' => $this->talent_id,
            'portfolio_id' => $this->portfolio_id,
        ]);

        return $dataProvider;
    }
}
