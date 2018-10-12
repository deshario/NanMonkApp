<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "promotion".
 *
 * @property int $idpromotion รหัสสมณศักดิ์
 * @property string $promotionname ชื่อสมณศักดิ์
 *
 * @property PromotionTrans[] $promotionTrans
 */
class Promotion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promotion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['promotionname'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpromotion' => 'รหัสสมณศักดิ์',
            'promotionname' => 'ชื่อสมณศักดิ์',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPromotionTrans()
    {
        return $this->hasMany(PromotionTrans::className(), ['idpromotion' => 'idpromotion']);
    }
}
