<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Rank;

/**
 * RankSearch represents the model behind the search form of `app\models\Rank`.
 */
class RankSearch extends Rank
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rank_id', 'rank_position', 'rank_temple_address', 'rank_type'], 'integer'],
            [['rank_given_temple', 'rank_given_date', 'rank_file'], 'safe'],
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
        $query = Rank::find();

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
            'rank_id' => $this->rank_id,
            'rank_position' => $this->rank_position,
            'rank_given_date' => $this->rank_given_date,
            'rank_temple_address' => $this->rank_temple_address,
            'rank_type' => $this->rank_type,
        ]);

        $query->andFilterWhere(['like', 'rank_given_temple', $this->rank_given_temple])
            ->andFilterWhere(['like', 'rank_file', $this->rank_file]);

        return $dataProvider;
    }
}
