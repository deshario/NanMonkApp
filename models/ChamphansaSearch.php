<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Champhansa;

/**
 * ChamphansaSearch represents the model behind the search form of `app\models\Champhansa`.
 */
class ChamphansaSearch extends Champhansa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['champhansa_id', 'champhansa_address', 'champhansa_duration'], 'integer'],
            [['champhansa_temple', 'champhansa_move_in', 'champhansa_move_out'], 'safe'],
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
        $query = Champhansa::find();

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
            'champhansa_id' => $this->champhansa_id,
            'champhansa_address' => $this->champhansa_address,
            'champhansa_move_in' => $this->champhansa_move_in,
            'champhansa_move_out' => $this->champhansa_move_out,
            'champhansa_duration' => $this->champhansa_duration,
        ]);

        $query->andFilterWhere(['like', 'champhansa_temple', $this->champhansa_temple]);

        return $dataProvider;
    }
}
