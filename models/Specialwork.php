<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "specialwork".
 *
 * @property int $idwork รหัสประเภทผลงานทีสำคัญ
 * @property string $worktype ประเภทผลงานที่สำคัญ
 *
 * @property SpecialworkTrans[] $specialworkTrans
 */
class Specialwork extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'specialwork';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['worktype'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idwork' => 'รหัสประเภทผลงานทีสำคัญ',
            'worktype' => 'ประเภทผลงานที่สำคัญ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialworkTrans()
    {
        return $this->hasMany(SpecialworkTrans::className(), ['idwork' => 'idwork']);
    }
}
