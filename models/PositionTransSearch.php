<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PositionTrans;

/**
 * PositionTransSearch represents the model behind the search form of `app\models\PositionTrans`.
 */
class PositionTransSearch extends PositionTrans
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idpos', 'position_id', 'address_id'], 'integer'],
            [['idperson', 'positiondate', 'temple', 'remark', 'attachfile'], 'safe'],
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
        $query = PositionTrans::find();

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
            'idpos' => $this->idpos,
            'position_id' => $this->position_id,
            'positiondate' => $this->positiondate,
            'address_id' => $this->address_id,
        ]);

        $query->andFilterWhere(['like', 'idperson', $this->idperson])
            ->andFilterWhere(['like', 'temple', $this->temple])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'attachfile', $this->attachfile]);

        return $dataProvider;
    }
}
