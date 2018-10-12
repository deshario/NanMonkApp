<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TrainingTrans;

/**
 * TrainingTransSearch represents the model behind the search form of `app\models\TrainingTrans`.
 */
class TrainingTransSearch extends TrainingTrans
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'training_id'], 'integer'],
            [['idperson', 'trainingdate', 'trainingby', 'others', 'attachfile'], 'safe'],
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
        $query = TrainingTrans::find();

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
            'id' => $this->id,
            'training_id' => $this->training_id,
            'trainingdate' => $this->trainingdate,
        ]);

        $query->andFilterWhere(['like', 'idperson', $this->idperson])
            ->andFilterWhere(['like', 'trainingby', $this->trainingby])
            ->andFilterWhere(['like', 'others', $this->others])
            ->andFilterWhere(['like', 'attachfile', $this->attachfile]);

        return $dataProvider;
    }
}
