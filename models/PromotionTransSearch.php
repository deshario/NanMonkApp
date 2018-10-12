<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PromotionTrans;

/**
 * PromotionTransSearch represents the model behind the search form of `app\models\PromotionTrans`.
 */
class PromotionTransSearch extends PromotionTrans
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idpos', 'idpromotion', 'temple_address'], 'integer'],
            [['idperson', 'promotiondate', 'place1', 'place2', 'temple', 'year', 'remark', 'attachfile'], 'safe'],
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
        $query = PromotionTrans::find();

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
            'idpromotion' => $this->idpromotion,
            'promotiondate' => $this->promotiondate,
            'temple_address' => $this->temple_address,
            'year' => $this->year,
        ]);

        $query->andFilterWhere(['like', 'idperson', $this->idperson])
            ->andFilterWhere(['like', 'place1', $this->place1])
            ->andFilterWhere(['like', 'place2', $this->place2])
            ->andFilterWhere(['like', 'temple', $this->temple])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'attachfile', $this->attachfile]);

        return $dataProvider;
    }
}
