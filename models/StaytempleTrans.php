<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "staytemple_trans".
 *
 * @property int $idstay ลำดับการย้ายวัด
 * @property string $idperson หมายเลขบัตรประชาชน
 * @property string $indate วันที่ย้ายเข้า
 * @property string $outdate วันที่ย้ายออก
 * @property string $staytemple ชื่อวัดที่จำพรรษา
 * @property int $staytemple_address ที่อยู่ของวัดที่จำพรรษา
 *
 * @property Address $staytempleAddress
 * @property PersonMaster $person
 */
class StaytempleTrans extends \yii\db\ActiveRecord
{
    public $province;
    public $amphur;
    public $tambol;

    public static function tableName()
    {
        return 'staytemple_trans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idperson'], 'required'],
            [['indate', 'staytemple'], 'required'],
            [['province','amphur','tambol'], 'required'],
            [['staytemple_address'], 'integer'],
            [['idperson'], 'string', 'max' => 13],
            [['staytemple'], 'string', 'max' => 80],
            [['staytemple_address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['staytemple_address' => 'address_id']],
            [['idperson'], 'exist', 'skipOnError' => true, 'targetClass' => PersonMaster::className(), 'targetAttribute' => ['idperson' => 'idperson']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idstay' => 'ลำดับการย้ายวัด',
            'idperson' => 'หมายเลขบัตรประชาชน',
            'indate' => 'วันที่ย้ายเข้า',
            'outdate' => 'วันที่ย้ายออก',
            'staytemple' => 'ชื่อวัดที่จำพรรษา',
            'staytemple_address' => 'ที่อยู่ของวัดที่จำพรรษา',
            'province' => 'จังหวัด',
            'amphur' => 'อำเภอ',
            'tambol' => 'ตำบล',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaytempleAddress()
    {
        return $this->hasOne(Address::className(), ['address_id' => 'staytemple_address']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(PersonMaster::className(), ['idperson' => 'idperson']);
    }
}
