<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Talent;

/**
 * TalentSearch represents the model behind the search form of `app\models\Talent`.
 */
class TalentSearch extends Talent
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['talent_id'], 'integer'],
            [['talent_name'], 'safe'],
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
        $query = Talent::find();

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
            'talent_id' => $this->talent_id,
        ]);

        $query->andFilterWhere(['like', 'talent_name', $this->talent_name]);

        return $dataProvider;
    }
}
