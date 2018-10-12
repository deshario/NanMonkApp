<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StaytempleTrans;

/**
 * StaytempleTransSearch represents the model behind the search form of `app\models\StaytempleTrans`.
 */
class StaytempleTransSearch extends StaytempleTrans
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idstay', 'staytemple_address'], 'integer'],
            [['idperson', 'indate', 'outdate', 'staytemple'], 'safe'],
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
        $query = StaytempleTrans::find();

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
            'idstay' => $this->idstay,
            'indate' => $this->indate,
            'outdate' => $this->outdate,
            'staytemple_address' => $this->staytemple_address,
        ]);

        $query->andFilterWhere(['like', 'idperson', $this->idperson])
            ->andFilterWhere(['like', 'staytemple', $this->staytemple]);

        return $dataProvider;
    }
}
