<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CurrentData;

/**
 * CurrentDataSearch represents the model behind the search form of `app\models\CurrentData`.
 */
class CurrentDataSearch extends CurrentData
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['current_id', 'phansa_year', 'current_address'], 'integer'],
            [['citizen_no', 'book_no', 'current_name', 'surname', 'cogname', 'birthday', 'wittayathana', 'temple', 'sect', 'career', 'national', 'father_name', 'mother_name'], 'safe'],
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
        $query = CurrentData::find();

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
            'current_id' => $this->current_id,
            'birthday' => $this->birthday,
            'phansa_year' => $this->phansa_year,
            'current_address' => $this->current_address,
        ]);

        $query->andFilterWhere(['like', 'citizen_no', $this->citizen_no])
            ->andFilterWhere(['like', 'book_no', $this->book_no])
            ->andFilterWhere(['like', 'current_name', $this->current_name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'cogname', $this->cogname])
            ->andFilterWhere(['like', 'wittayathana', $this->wittayathana])
            ->andFilterWhere(['like', 'temple', $this->temple])
            ->andFilterWhere(['like', 'sect', $this->sect])
            ->andFilterWhere(['like', 'career', $this->career])
            ->andFilterWhere(['like', 'national', $this->national])
            ->andFilterWhere(['like', 'father_name', $this->father_name])
            ->andFilterWhere(['like', 'mother_name', $this->mother_name]);

        return $dataProvider;
    }
}
