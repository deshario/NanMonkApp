<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EducationTempTrans;

/**
 * EducationTempTransSearch represents the model behind the search form of `app\models\EducationTempTrans`.
 */
class EducationTempTransSearch extends EducationTempTrans
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idedu', 'education_level', 'placeprovince', 'address'], 'integer'],
            [['idperson', 'temple', 'place', 'attachfile'], 'safe'],
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
        $query = EducationTempTrans::find();

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
            'idedu' => $this->idedu,
            'education_level' => $this->education_level,
            'placeprovince' => $this->placeprovince,
            'address' => $this->address,
        ]);

        $query->andFilterWhere(['like', 'idperson', $this->idperson])
            ->andFilterWhere(['like', 'temple', $this->temple])
            ->andFilterWhere(['like', 'place', $this->place])
            ->andFilterWhere(['like', 'attachfile', $this->attachfile]);

        return $dataProvider;
    }
}
