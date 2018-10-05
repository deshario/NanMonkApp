<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EduUniversity;

/**
 * EduUniversitySearch represents the model behind the search form of `app\models\EduUniversity`.
 */
class EduUniversitySearch extends EduUniversity
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['university_id', 'university_level', 'university_address'], 'integer'],
            [['university_name', 'university_transcript'], 'safe'],
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
        $query = EduUniversity::find();

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
            'university_id' => $this->university_id,
            'university_level' => $this->university_level,
            'university_address' => $this->university_address,
        ]);

        $query->andFilterWhere(['like', 'university_name', $this->university_name])
            ->andFilterWhere(['like', 'university_transcript', $this->university_transcript]);

        return $dataProvider;
    }
}
