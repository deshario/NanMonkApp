<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hobby".
 *
 * @property int $idhobby รหัสประเภทความสามารถพิเศษ
 * @property string $hobbytype ความสามารถพิเศษ
 *
 * @property HobbyTrans[] $hobbyTrans
 */
class Hobby extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hobby';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hobbytype'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idhobby' => 'รหัสประเภทความสามารถพิเศษ',
            'hobbytype' => 'ชนิดความสามารถพิเศษ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHobbyTrans()
    {
        return $this->hasMany(HobbyTrans::className(), ['idhobby' => 'idhobby']);
    }
}
