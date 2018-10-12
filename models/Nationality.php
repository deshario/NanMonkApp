<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nationality".
 *
 * @property int $idnationality รหัสสัญชาติ
 * @property string $nationalityname ชื่อสัญชาติ
 *
 * @property PersonMaster[] $personMasters
 */
class Nationality extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nationality';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nationalityname'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idnationality' => 'รหัสสัญชาติ',
            'nationalityname' => 'ชื่อสัญชาติ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonMasters()
    {
        return $this->hasMany(PersonMaster::className(), ['idnationality' => 'idnationality']);
    }
}
