<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "movetemple_trans".
 *
 * @property int $idmove ลำดับการย้ายวัด
 * @property string $idperson หมายเลขบัตรประชาชน
 * @property string $fromdate ย้ายเมื่อวันที่
 * @property string $fromtemple ย้ายมาจากวัด
 * @property string $reason สาเหตุที่ย้าย
 * @property int $address ที่อยู่ของวัดที่ย้ายมา
 *
 * @property Address $address0
 * @property PersonMaster $person
 */
class MovetempleTrans extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'movetemple_trans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idperson'], 'required'],
            [['fromdate'], 'safe'],
            [['address'], 'integer'],
            [['idperson'], 'string', 'max' => 13],
            [['fromtemple'], 'string', 'max' => 80],
            [['reason'], 'string', 'max' => 100],
            [['address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['address' => 'address_id']],
            [['idperson'], 'exist', 'skipOnError' => true, 'targetClass' => PersonMaster::className(), 'targetAttribute' => ['idperson' => 'idperson']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idmove' => 'ลำดับการย้ายวัด',
            'idperson' => 'หมายเลขบัตรประชาชน',
            'fromdate' => 'ย้ายเมื่อวันที่',
            'fromtemple' => 'ย้ายมาจากวัด',
            'reason' => 'สาเหตุที่ย้าย',
            'address' => 'ที่อยู่ของวัดที่ย้ายมา',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress0()
    {
        return $this->hasOne(Address::className(), ['address_id' => 'address']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(PersonMaster::className(), ['idperson' => 'idperson']);
    }
}
