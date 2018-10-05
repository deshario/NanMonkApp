<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "district".
 *
 * @property int $DISTRICT_ID
 * @property string $DISTRICT_CODE
 * @property string $DISTRICT_NAME ตำบล
 * @property int $AMPHUR_ID
 * @property int $PROVINCE_ID
 * @property int $GEO_ID
 */
class Tambol extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'district';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['DISTRICT_ID', 'DISTRICT_CODE', 'DISTRICT_NAME'], 'required'],
            [['DISTRICT_ID', 'AMPHUR_ID', 'PROVINCE_ID', 'GEO_ID'], 'integer'],
            [['DISTRICT_CODE'], 'string', 'max' => 6],
            [['DISTRICT_NAME'], 'string', 'max' => 150],
            [['DISTRICT_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'DISTRICT_ID' => 'District  ID',
            'DISTRICT_CODE' => 'District  Code',
            'DISTRICT_NAME' => 'District  Name',
            'AMPHUR_ID' => 'Amphur  ID',
            'PROVINCE_ID' => 'Province  ID',
            'GEO_ID' => 'Geo  ID',
        ];
    }
}
