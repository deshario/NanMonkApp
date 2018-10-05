<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Woopasombod;

/**
 * WoopasombodSearch represents the model behind the search form of `app\models\Woopasombod`.
 */
class WoopasombodSearch extends Woopasombod
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['woopasombod_id', 'woopasombod_address', 'woopatcha_address', 'kammawajarn_address', 'anutsawanajarn_address'], 'integer'],
            [['woopasombod_date', 'woopasombod_temple', 'woopatcha_by', 'kammawajarn', 'anutsawanajarn'], 'safe'],
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
        $query = Woopasombod::find();

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
            'woopasombod_id' => $this->woopasombod_id,
            'woopasombod_date' => $this->woopasombod_date,
            'woopasombod_address' => $this->woopasombod_address,
            'woopatcha_address' => $this->woopatcha_address,
            'kammawajarn_address' => $this->kammawajarn_address,
            'anutsawanajarn_address' => $this->anutsawanajarn_address,
        ]);

        $query->andFilterWhere(['like', 'woopasombod_temple', $this->woopasombod_temple])
            ->andFilterWhere(['like', 'woopatcha_by', $this->woopatcha_by])
            ->andFilterWhere(['like', 'kammawajarn', $this->kammawajarn])
            ->andFilterWhere(['like', 'anutsawanajarn', $this->anutsawanajarn]);

        return $dataProvider;
    }
}
