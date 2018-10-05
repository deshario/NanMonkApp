<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "position".
 *
 * @property int $position_id
 * @property string $position_name ชื่อตำแหน่ง
 *
 * @property Rank[] $ranks
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'position';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['position_name'], 'string', 'max' => 80],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'position_id' => 'Position ID',
            'position_name' => 'ตำแหน่ง',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRanks()
    {
        return $this->hasMany(Rank::className(), ['rank_position' => 'position_id']);
    }
}
