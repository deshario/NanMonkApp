<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "position".
 *
 * @property int $idposition รหัสตำแหน่ง
 * @property string $positionname ชื่อตำแหน่ง
 *
 * @property PositionTrans[] $positionTrans
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
            [['positionname'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idposition' => 'รหัสตำแหน่ง',
            'positionname' => 'ชื่อตำแหน่ง',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPositionTrans()
    {
        return $this->hasMany(PositionTrans::className(), ['position_id' => 'idposition']);
    }
}
