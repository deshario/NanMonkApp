<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Training;

/**
 * TrainingSearch represents the model behind the search form of `app\models\Training`.
 */
class TrainingSearch extends Training
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['training_id'], 'integer'],
            [['training_course', 'training_date', 'training_by'], 'safe'],
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
        $query = Training::find();

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
            'training_id' => $this->training_id,
            'training_date' => $this->training_date,
        ]);

        $query->andFilterWhere(['like', 'training_course', $this->training_course])
            ->andFilterWhere(['like', 'training_by', $this->training_by]);

        return $dataProvider;
    }
}
