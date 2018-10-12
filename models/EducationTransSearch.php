<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EducationTrans;

/**
 * EducationTransSearch represents the model behind the search form of `app\models\EducationTrans`.
 */
class EducationTransSearch extends EducationTrans
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idedu', 'education_level', 'address'], 'integer'],
            [['idperson', 'place', 'major', 'year', 'abbrev', 'transcriptname', 'attachfile'], 'safe'],
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
        $query = EducationTrans::find();

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
            'address' => $this->address,
        ]);

        $query->andFilterWhere(['like', 'idperson', $this->idperson])
            ->andFilterWhere(['like', 'place', $this->place])
            ->andFilterWhere(['like', 'major', $this->major])
            ->andFilterWhere(['like', 'year', $this->year])
            ->andFilterWhere(['like', 'abbrev', $this->abbrev])
            ->andFilterWhere(['like', 'transcriptname', $this->transcriptname])
            ->andFilterWhere(['like', 'attachfile', $this->attachfile]);

        return $dataProvider;
    }
}
