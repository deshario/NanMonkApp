<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Hobby;

/**
 * HobbySearch represents the model behind the search form of `app\models\Hobby`.
 */
class HobbySearch extends Hobby
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idhobby'], 'integer'],
            [['hobbytype'], 'safe'],
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
        $query = Hobby::find();

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
            'idhobby' => $this->idhobby,
        ]);

        $query->andFilterWhere(['like', 'hobbytype', $this->hobbytype]);

        return $dataProvider;
    }
}
