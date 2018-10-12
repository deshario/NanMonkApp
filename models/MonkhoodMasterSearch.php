<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MonkhoodMaster;

/**
 * MonkhoodMasterSearch represents the model behind the search form of `app\models\MonkhoodMaster`.
 */
class MonkhoodMasterSearch extends MonkhoodMaster
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['monkhood_id', 'childmonkage', 'childmonk_address', 'childmonk_t1_address', 'monk_age', 'monk_address', 'monk_t1_address', 'monk_t2_address', 'monk_t3_address', 'staymonk_address'], 'integer'],
            [['idperson', 'childmonkdate', 'childmonk_temple', 'childmonk_t1_name', 'childmonk_t1_temple', 'monk_date', 'monk_time', 'monk_temple', 'monk_t1_name', 'monk_t1_temple', 'monk_t2_name', 'monk_t2_temple', 'monk_t3_name', 'monk_t3_temple', 'staytemple', 'staymonkname'], 'safe'],
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
        $query = MonkhoodMaster::find();

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
            'monkhood_id' => $this->monkhood_id,
            'childmonkage' => $this->childmonkage,
            'childmonkdate' => $this->childmonkdate,
            'childmonk_address' => $this->childmonk_address,
            'childmonk_t1_address' => $this->childmonk_t1_address,
            'monk_age' => $this->monk_age,
            'monk_date' => $this->monk_date,
            'monk_time' => $this->monk_time,
            'monk_address' => $this->monk_address,
            'monk_t1_address' => $this->monk_t1_address,
            'monk_t2_address' => $this->monk_t2_address,
            'monk_t3_address' => $this->monk_t3_address,
            'staymonk_address' => $this->staymonk_address,
        ]);

        $query->andFilterWhere(['like', 'idperson', $this->idperson])
            ->andFilterWhere(['like', 'childmonk_temple', $this->childmonk_temple])
            ->andFilterWhere(['like', 'childmonk_t1_name', $this->childmonk_t1_name])
            ->andFilterWhere(['like', 'childmonk_t1_temple', $this->childmonk_t1_temple])
            ->andFilterWhere(['like', 'monk_temple', $this->monk_temple])
            ->andFilterWhere(['like', 'monk_t1_name', $this->monk_t1_name])
            ->andFilterWhere(['like', 'monk_t1_temple', $this->monk_t1_temple])
            ->andFilterWhere(['like', 'monk_t2_name', $this->monk_t2_name])
            ->andFilterWhere(['like', 'monk_t2_temple', $this->monk_t2_temple])
            ->andFilterWhere(['like', 'monk_t3_name', $this->monk_t3_name])
            ->andFilterWhere(['like', 'monk_t3_temple', $this->monk_t3_temple])
            ->andFilterWhere(['like', 'staytemple', $this->staytemple])
            ->andFilterWhere(['like', 'staymonkname', $this->staymonkname]);

        return $dataProvider;
    }
}
