<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "position_trans".
 *
 * @property int $idpos ลำดับตำแหน่ง
 * @property string $idperson หมายเลขบัตรประชาชน
 * @property int $position_id ระดับตำแหน่ง
 * @property string $positiondate วันที่ได้รับตำแหน่ง
 * @property string $temple ชื่อวัดประจำตำแหน่ง
 * @property string $remark หมายเหตุหรือเพิ่มเติมข้อมูล หรือตำแหน่งอื่นๆ 
 * @property string $attachfile เส้นทางการจัดเก็บไฟล์แนบ
 * @property int $address_id ที่อยู่ของวัดที่ได้ตำแหน่ง
 *
 * @property Address $address
 * @property PersonMaster $person
 * @property Position $position
 */
class PositionTrans extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'position_trans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idperson'], 'required'],
            [['position_id', 'address_id'], 'integer'],
            [['positiondate'], 'safe'],
            [['idperson'], 'string', 'max' => 13],
            [['temple'], 'string', 'max' => 80],
            [['remark', 'attachfile'], 'string', 'max' => 100],
            [['address_id'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['address_id' => 'address_id']],
            [['idperson'], 'exist', 'skipOnError' => true, 'targetClass' => PersonMaster::className(), 'targetAttribute' => ['idperson' => 'idperson']],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => Position::className(), 'targetAttribute' => ['position_id' => 'idposition']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpos' => 'ลำดับตำแหน่ง',
            'idperson' => 'หมายเลขบัตรประชาชน',
            'position_id' => 'ระดับตำแหน่ง',
            'positiondate' => 'วันที่ได้รับตำแหน่ง',
            'temple' => 'ชื่อวัดประจำตำแหน่ง',
            'remark' => 'หมายเหตุหรือเพิ่มเติมข้อมูล หรือตำแหน่งอื่นๆ ',
            'attachfile' => 'เส้นทางการจัดเก็บไฟล์แนบ',
            'address_id' => 'ที่อยู่ของวัดที่ได้ตำแหน่ง',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(Address::className(), ['address_id' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(PersonMaster::className(), ['idperson' => 'idperson']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(Position::className(), ['idposition' => 'position_id']);
    }
}
