<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EduSchool;

/**
 * EduSchoolSearch represents the model behind the search form of `app\models\EduSchool`.
 */
class EduSchoolSearch extends EduSchool
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['school_id', 'school_level', 'school_address'], 'integer'],
            [['school_name', 'school_transcript'], 'safe'],
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
        $query = EduSchool::find();

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
            'school_id' => $this->school_id,
            'school_level' => $this->school_level,
            'school_address' => $this->school_address,
        ]);

        $query->andFilterWhere(['like', 'school_name', $this->school_name])
            ->andFilterWhere(['like', 'school_transcript', $this->school_transcript]);

        return $dataProvider;
    }
}
