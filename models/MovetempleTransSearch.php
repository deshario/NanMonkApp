<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MovetempleTrans;

/**
 * MovetempleTransSearch represents the model behind the search form of `app\models\MovetempleTrans`.
 */
class MovetempleTransSearch extends MovetempleTrans
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idmove', 'address'], 'integer'],
            [['idperson', 'fromdate', 'fromtemple', 'reason'], 'safe'],
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
        $query = MovetempleTrans::find();

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
            'idmove' => $this->idmove,
            'fromdate' => $this->fromdate,
            'address' => $this->address,
        ]);

        $query->andFilterWhere(['like', 'idperson', $this->idperson])
            ->andFilterWhere(['like', 'fromtemple', $this->fromtemple])
            ->andFilterWhere(['like', 'reason', $this->reason]);

        return $dataProvider;
    }
}
