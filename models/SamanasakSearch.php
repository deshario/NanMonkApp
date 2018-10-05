<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Samanasak;

/**
 * SamanasakSearch represents the model behind the search form of `app\models\Samanasak`.
 */
class SamanasakSearch extends Samanasak
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['samanasak_id', 'samanasak_level'], 'integer'],
            [['rachathinanam', 'samanasak_date'], 'safe'],
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
        $query = Samanasak::find();

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
            'samanasak_id' => $this->samanasak_id,
            'samanasak_level' => $this->samanasak_level,
            'samanasak_date' => $this->samanasak_date,
        ]);

        $query->andFilterWhere(['like', 'rachathinanam', $this->rachathinanam]);

        return $dataProvider;
    }
}
