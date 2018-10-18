<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "monkhood_master".
 *
 * @property int $monkhood_id
 * @property string $idperson หมายเลขบัตรประชาชน
 * @property int $childmonkage อายุวันที่บรรพชา
 * @property string $childmonkdate วันที่บรรพชา
 * @property string $childmonk_temple บรรพชาที่วัด
 * @property int $childmonk_address ที่อยู่ของวัดที่บรรพชา
 * @property string $childmonk_t1_name ชื่อพระที่บรรพชาให้
 * @property string $childmonk_t1_temple พระที่บรรพชาให้ สังกัดวัด
 * @property int $childmonk_t1_address ที่อยู่วัดของพระที่บรรพชา
 * @property int $monk_age อายุวันที่อุปสมบท
 * @property string $monk_date วันที่อุปสมบท
 * @property string $monk_time เวลาอุปสมบท
 * @property string $monk_temple วัดที่อุปสมบท
 * @property int $monk_address ที่อยู่ของวัดที่อุปสมบท
 * @property string $monk_t1_name ชื่อพระอุปัชฌาย์
 * @property string $monk_t1_temple วัดของพระอุปัชฌาย์
 * @property int $monk_t1_address ที่อยู่วัดของพระอุปัชฌาย์
 * @property string $monk_t2_name ชื่อพระกรรมวาจาจารย์
 * @property string $monk_t2_temple วัดของพระกรรมวาจาจารย์
 * @property int $monk_t2_address ที่อยู่วัดของพระกรรมวาจาจารย์
 * @property string $monk_t3_name ชื่อของพระอนุสาวนาจารย์
 * @property string $monk_t3_temple วัดของพระอนุสาวนาจารย์
 * @property int $monk_t3_address ที่อยู่วัดของพระอนุสาวนาจารย์
 * @property string $staytemple สังกัดวัดเมื่อบวช
 * @property string $staymonkname ชื่อเจ้าอาวาสวัดที่สังกัดเมื่อบวช
 * @property int $staymonk_address ที่อยู่วัดที่สังกัดเมื่อบวช
 *
 * @property PersonMaster $person
 * @property Address $childmonkAddress
 * @property Address $childmonkT1Address
 * @property Address $monkAddress
 * @property Address $monkT1Address
 * @property Address $monkT2Address
 * @property Address $monkT3Address
 * @property Address $staymonkAddress
 */
class MonkhoodMaster extends \yii\db\ActiveRecord
{
    public $province;
    public $amphur;
    public $tambol;

    public $province_ii,$province_iii,$province_iv,$province_v,$province_vi,$province_vii;
    public $amphur_ii,$amphur_iii,$amphur_iv,$amphur_v,$amphur_vi,$amphur_vii;
    public $tambol_ii,$tambol_iii,$tambol_iv,$tambol_v,$tambol_vi,$tambol_vii;

    const banpacha = 1;
    const woopasombod = 2;

    public static function tableName()
    {
        return 'monk_master';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idperson'], 'required'],
            [['province','amphur','tambol'], 'safe'],
            [['province_ii','amphur_ii','tambol_ii'], 'safe'], //ผู้บรรพชา
            [['province_iii','amphur_iii','tambol_iii'], 'safe'], //บรรพชาเมือ
            [['province_iv','amphur_iv','tambol_iv'], 'safe'], //บรรพชาเมือ
            [['province_v','amphur_v','tambol_v'], 'safe'], //บรรพชาเมือ
            [['province_vi','amphur_vi','tambol_vi'], 'safe'], //บรรพชาเมือ
            [['province_vii','amphur_vii','tambol_vii'], 'safe'], //บรรพชาเมือ
            [['childmonkage', 'childmonk_address', 'childmonk_t1_address', 'monk_age', 'monk_address', 'monk_t1_address', 'monk_t2_address', 'monk_t3_address', 'staymonk_address'], 'integer'],
            [['childmonkdate', 'monk_date', 'monk_time'], 'safe'],
            [['idperson'], 'string', 'max' => 13],
            [['childmonk_temple', 'childmonk_t1_temple', 'monk_temple', 'monk_t1_temple', 'monk_t2_temple', 'monk_t3_temple'], 'string', 'max' => 80],
            [['childmonk_t1_name', 'monk_t1_name', 'monk_t2_name', 'monk_t3_name', 'staytemple', 'staymonkname'], 'string', 'max' => 60],
            [['idperson'], 'exist', 'skipOnError' => true, 'targetClass' => PersonMaster::className(), 'targetAttribute' => ['idperson' => 'idperson']],
            [['childmonk_address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['childmonk_address' => 'address_id']],
            [['childmonk_t1_address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['childmonk_t1_address' => 'address_id']],
            [['monk_address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['monk_address' => 'address_id']],
            [['monk_t1_address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['monk_t1_address' => 'address_id']],
            [['monk_t2_address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['monk_t2_address' => 'address_id']],
            [['monk_t3_address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['monk_t3_address' => 'address_id']],
            [['staymonk_address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['staymonk_address' => 'address_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'monkhood_id' => 'Monkhood ID',
            'idperson' => 'หมายเลขบัตรประชาชน',
            'childmonkage' => 'อายุวันที่บรรพชา',
            'childmonkdate' => 'วันที่บรรพชา',
            'childmonk_temple' => 'บรรพชาที่วัด',
            'childmonk_address' => 'ที่อยู่ของวัดที่บรรพชา',
            'childmonk_t1_name' => 'ชื่อพระที่บรรพชาให้',
            'childmonk_t1_temple' => 'พระที่บรรพชาให้ สังกัดวัด',
            'childmonk_t1_address' => 'ที่อยู่วัดของพระที่บรรพชา',
            'monk_age' => 'อายุวันที่อุปสมบท',
            'monk_date' => 'วันที่อุปสมบท',
           // 'monk_time' => 'เวลาอุปสมบท',
            'monk_temple' => 'วัดที่อุปสมบท',
            'monk_address' => 'ที่อยู่ของวัดที่อุปสมบท',
            'monk_t1_name' => 'ชื่อพระอุปัชฌาย์',
            'monk_t1_temple' => 'วัดของพระอุปัชฌาย์',
            'monk_t1_address' => 'ที่อยู่วัดของพระอุปัชฌาย์',
            'monk_t2_name' => 'ชื่อพระกรรมวาจาจารย์',
            'monk_t2_temple' => 'วัดของพระกรรมวาจาจารย์',
            'monk_t2_address' => 'ที่อยู่วัดของพระกรรมวาจาจารย์',
            'monk_t3_name' => 'ชื่อของพระอนุสาวนาจารย์',
            'monk_t3_temple' => 'วัดของพระอนุสาวนาจารย์',
            'monk_t3_address' => 'ที่อยู่วัดของพระอนุสาวนาจารย์',
            'staytemple' => 'สังกัดวัดเมื่อบวช',
            'staymonkname' => 'ชื่อเจ้าอาวาสวัดที่สังกัดเมื่อบวช',
            'staymonk_address' => 'ที่อยู่วัดที่สังกัดเมื่อบวช',

            'province' => 'จังหวัด',
            'amphur' => 'อำเภอ',
            'tambol' => 'ตำบล',
            'province_ii' => 'จังหวัด',
            'amphur_ii' => 'อำเภอ',
            'tambol_ii' => 'ตำบล',
            'province_iii' => 'จังหวัด',
            'amphur_iii' => 'อำเภอ',
            'tambol_iii' => 'ตำบล',
            'province_iv' => 'จังหวัด',
            'amphur_iv' => 'อำเภอ',
            'tambol_iv' => 'ตำบล',
            'province_v' => 'จังหวัด',
            'amphur_v' => 'อำเภอ',
            'tambol_v' => 'ตำบล',
            'province_vi' => 'จังหวัด',
            'amphur_vi' => 'อำเภอ',
            'tambol_vi' => 'ตำบล',
            'province_vii' => 'จังหวัด',
            'amphur_vii' => 'อำเภอ',
            'tambol_vii' => 'ตำบล',
        ];
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
    public function getChildmonkAddress()
    {
        return $this->hasOne(Address::className(), ['address_id' => 'childmonk_address']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildmonkT1Address()
    {
        return $this->hasOne(Address::className(), ['address_id' => 'childmonk_t1_address']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMonkAddress()
    {
        return $this->hasOne(Address::className(), ['address_id' => 'monk_address']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMonkT1Address()
    {
        return $this->hasOne(Address::className(), ['address_id' => 'monk_t1_address']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMonkT2Address()
    {
        return $this->hasOne(Address::className(), ['address_id' => 'monk_t2_address']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMonkT3Address()
    {
        return $this->hasOne(Address::className(), ['address_id' => 'monk_t3_address']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaymonkAddress()
    {
        return $this->hasOne(Address::className(), ['address_id' => 'staymonk_address']);
    }
}
