<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EduDhamma;

/**
 * EduDhammaSearch represents the model behind the search form of `app\models\EduDhamma`.
 */
class EduDhammaSearch extends EduDhamma
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dhamma_id', 'education_level', 'dhamma_temple_address'], 'integer'],
            [['dhamma_temple', 'dhamma_transcript'], 'safe'],
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
        $query = EduDhamma::find();

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
            'dhamma_id' => $this->dhamma_id,
            'education_level' => $this->education_level,
            'dhamma_temple_address' => $this->dhamma_temple_address,
        ]);

        $query->andFilterWhere(['like', 'dhamma_temple', $this->dhamma_temple])
            ->andFilterWhere(['like', 'dhamma_transcript', $this->dhamma_transcript]);

        return $dataProvider;
    }
}
