<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "champhansa".
 *
 * @property int $champhansa_id
 * @property string $champhansa_temple วัดที่จำพรรษา
 * @property int $champhansa_address ที่อยู่ของวัดที่จำพรรษา
 * @property string $champhansa_move_in วันที่ย้ายเข้า
 * @property string $champhansa_move_out วันที่ย้ายออก
 * @property int $champhansa_duration จำนวนพรรษา
 *
 * @property Address $champhansaAddress
 * @property MainTable[] $mainTables
 */
class Champhansa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'champhansa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['champhansa_temple', 'champhansa_address', 'champhansa_move_in', 'champhansa_move_out', 'champhansa_duration'], 'required'],
            [['champhansa_address', 'champhansa_duration'], 'integer'],
            [['champhansa_move_in', 'champhansa_move_out'], 'safe'],
            [['champhansa_temple'], 'string', 'max' => 45],
            [['champhansa_address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['champhansa_address' => 'address_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'champhansa_id' => 'Champhansa ID',
            'champhansa_temple' => 'วัดที่จำพรรษา',
            'champhansa_address' => 'ที่อยู่ของวัดที่จำพรรษา',
            'champhansa_move_in' => 'วันที่ย้ายเข้า',
            'champhansa_move_out' => 'วันที่ย้ายออก',
            'champhansa_duration' => 'จำนวนพรรษา',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChamphansaAddress()
    {
        return $this->hasOne(Address::className(), ['address_id' => 'champhansa_address']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMainTables()
    {
        return $this->hasMany(MainTable::className(), ['champhansa_id' => 'champhansa_id']);
    }
}
