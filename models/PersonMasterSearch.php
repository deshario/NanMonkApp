<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PersonMaster;

/**
 * PersonMasterSearch represents the model behind the search form of `app\models\PersonMaster`.
 */
class PersonMasterSearch extends PersonMaster
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idperson', 'person_book_no', 'person_pic', 'firstname', 'surname', 'aliasname', 'birthdate', 'level', 'temple', 'homeno', 'section', 'occupation', 'quality', 'color', 'special', 'father', 'mother', 'family_homeno'], 'safe'],
            [['user_id', 'staytemp', 'address', 'idnationality', 'family_address'], 'integer'],
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
        $query = PersonMaster::find();

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
            'user_id' => $this->user_id,
            'birthdate' => $this->birthdate,
            'staytemp' => $this->staytemp,
            'address' => $this->address,
            'idnationality' => $this->idnationality,
            'family_address' => $this->family_address,
        ]);

        $query->andFilterWhere(['like', 'idperson', $this->idperson])
            ->andFilterWhere(['like', 'person_book_no', $this->person_book_no])
            ->andFilterWhere(['like', 'person_pic', $this->person_pic])
            ->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'aliasname', $this->aliasname])
            ->andFilterWhere(['like', 'level', $this->level])
            ->andFilterWhere(['like', 'temple', $this->temple])
            ->andFilterWhere(['like', 'homeno', $this->homeno])
            ->andFilterWhere(['like', 'section', $this->section])
            ->andFilterWhere(['like', 'occupation', $this->occupation])
            ->andFilterWhere(['like', 'quality', $this->quality])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'special', $this->special])
            ->andFilterWhere(['like', 'father', $this->father])
            ->andFilterWhere(['like', 'mother', $this->mother])
            ->andFilterWhere(['like', 'family_homeno', $this->family_homeno]);

        return $dataProvider;
    }
}
