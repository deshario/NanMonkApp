<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "woopasombod".
 *
 * @property int $woopasombod_id
 * @property string $woopasombod_date วันที่อุปสมบท
 * @property string $woopasombod_temple วัดที่อุปสมบท
 * @property int $woopasombod_address ที่อยู่ของวัดที่อุปสมบท
 * @property string $woopatcha_by พระอุปัชฌาย์
 * @property int $woopatcha_address ที่อยู่ของวัดของพระอุปชฌาย์
 * @property string $kammawajarn พระกรรมวาจาจารย์
 * @property int $kammawajarn_address ที่อยู่ของวัดของพระกรรมวาจาจารย์
 * @property string $anutsawanajarn พระอนุสาวนาจารย์
 * @property int $anutsawanajarn_address ที่อยู่ของวัดของพระอนุสาวนาจารย์
 *
 * @property MainTable[] $mainTables
 * @property Address $woopasombodAddress
 * @property Address $woopatchaAddress
 * @property Address $kammawajarnAddress
 * @property Address $anutsawanajarnAddress
 */
class Woopasombod extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'woopasombod';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['woopasombod_date', 'woopasombod_temple', 'woopasombod_address'], 'required'],
            [['woopasombod_date'], 'safe'],
            [['woopasombod_address', 'woopatcha_address', 'kammawajarn_address', 'anutsawanajarn_address'], 'integer'],
            [['woopasombod_temple', 'woopatcha_by', 'kammawajarn', 'anutsawanajarn'], 'string', 'max' => 100],
            [['woopasombod_address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['woopasombod_address' => 'address_id']],
            [['woopatcha_address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['woopatcha_address' => 'address_id']],
            [['kammawajarn_address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['kammawajarn_address' => 'address_id']],
            [['anutsawanajarn_address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['anutsawanajarn_address' => 'address_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'woopasombod_id' => 'Woopasombod ID',
            'woopasombod_date' => 'วันที่อุปสมบท',
            'woopasombod_temple' => 'วัดที่อุปสมบท',
            'woopasombod_address' => 'ที่อยู่ของวัดที่อุปสมบท',
            'woopatcha_by' => 'พระอุปัชฌาย์',
            'woopatcha_address' => 'ที่อยู่ของวัดของพระอุปชฌาย์',
            'kammawajarn' => 'พระกรรมวาจาจารย์',
            'kammawajarn_address' => 'ที่อยู่ของวัดของพระกรรมวาจาจารย์',
            'anutsawanajarn' => 'พระอนุสาวนาจารย์',
            'anutsawanajarn_address' => 'ที่อยู่ของวัดของพระอนุสาวนาจารย์',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMainTables()
    {
        return $this->hasMany(MainTable::className(), ['woopasombod_id' => 'woopasombod_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWoopasombodAddress()
    {
        return $this->hasOne(Address::className(), ['address_id' => 'woopasombod_address']);
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
    public function getKammawajarnAddress()
    {
        return $this->hasOne(Address::className(), ['address_id' => 'kammawajarn_address']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnutsawanajarnAddress()
    {
        return $this->hasOne(Address::className(), ['address_id' => 'anutsawanajarn_address']);
    }
}
