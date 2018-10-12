<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EducationDhamma;

/**
 * EducationDhammaSearch represents the model behind the search form of `app\models\EducationDhamma`.
 */
class EducationDhammaSearch extends EducationDhamma
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_education'], 'integer'],
            [['education_name'], 'safe'],
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
        $query = EducationDhamma::find();

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
            'id_education' => $this->id_education,
        ]);

        $query->andFilterWhere(['like', 'education_name', $this->education_name]);

        return $dataProvider;
    }
}
