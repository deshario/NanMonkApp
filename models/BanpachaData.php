<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "banpacha_data".
 *
 * @property int $banpacha_id
 * @property string $banpacha_temple วัดที่บรรพชา
 * @property string $banpacha_date วันที่บรรพชา
 * @property int $banpacha_address ที่อยู่ของวัดที่บรรพชา
 * @property string $woopatcha_by พระอุปัชฌาย์
 * @property string $woopatcha_temple วัดของวัดพระอุปัชฌาย์
 * @property int $woopatcha_address ที่อยู่ของวัดของพระอุปชฌาย์
 *
 * @property Address $banpachaAddress
 * @property Address $woopatchaAddress
 * @property MainTable[] $mainTables
 */
class BanpachaData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banpacha_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['banpacha_temple', 'banpacha_date', 'banpacha_address'], 'required'],
            [['banpacha_date'], 'safe'],
            [['banpacha_address', 'woopatcha_address'], 'integer'],
            [['banpacha_temple', 'woopatcha_by', 'woopatcha_temple'], 'string', 'max' => 100],
            [['banpacha_address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['banpacha_address' => 'address_id']],
            [['woopatcha_address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['woopatcha_address' => 'address_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'banpacha_id' => 'Banpacha ID',
            'banpacha_temple' => 'วัดที่บรรพชา',
            'banpacha_date' => 'วันที่บรรพชา',
            'banpacha_address' => 'ที่อยู่ของวัดที่บรรพชา',
            'woopatcha_by' => 'พระอุปัชฌาย์',
            'woopatcha_temple' => 'วัดของวัดพระอุปัชฌาย์',
            'woopatcha_address' => 'ที่อยู่ของวัดของพระอุปชฌาย์',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBanpachaAddress()
    {
        return $this->hasOne(Address::className(), ['address_id' => 'banpacha_address']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWoopatchaAddress()
    {
        return $this->hasOne(Address::className(), ['address_id' => 'woopatcha_address']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMainTables()
    {
        return $this->hasMany(MainTable::className(), ['banpacha_id' => 'banpacha_id']);
    }
}
