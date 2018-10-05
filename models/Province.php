<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "province".
 *
 * @property int $PROVINCE_ID
 * @property string $PROVINCE_CODE
 * @property string $PROVINCE_NAME จังหวัด
 * @property int $GEO_ID
 */
class Province extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'province';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PROVINCE_ID', 'PROVINCE_CODE', 'PROVINCE_NAME'], 'required'],
            [['PROVINCE_ID', 'GEO_ID'], 'integer'],
            [['PROVINCE_CODE'], 'string', 'max' => 2],
            [['PROVINCE_NAME'], 'string', 'max' => 150],
            [['PROVINCE_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PROVINCE_ID' => 'Province  ID',
            'PROVINCE_CODE' => 'PROVINCE CODE',
            'PROVINCE_NAME' => 'PROVINCE NAME',
            'GEO_ID' => 'Geo ID',
        ];
    }
}
