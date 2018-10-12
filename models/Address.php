<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $address_id
 * @property int $tambol_id ตำบล
 * @property int $amphur_id อำเภอ
 * @property int $province_id จังหวัด
 * @property int $zipcode รหัสไปรษณีย์
 *
 * @property EducationTempTrans[] $educationTempTrans
 * @property EducationTrans[] $educationTrans
 * @property MovetempleTrans[] $movetempleTrans
 * @property PersonMaster[] $personMasters
 * @property PersonMaster[] $personMasters0
 * @property PositionTrans[] $positionTrans
 * @property PromotionTrans[] $promotionTrans
 * @property StaytempleTrans[] $staytempleTrans
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tambol_id', 'amphur_id', 'province_id'], 'required'],
            [['tambol_id', 'amphur_id', 'province_id', 'zipcode'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'address_id' => 'Address ID',
            'tambol_id' => 'ตำบล',
            'amphur_id' => 'อำเภอ',
            'province_id' => 'จังหวัด',
            'zipcode' => 'รหัสไปรษณีย์',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEducationTempTrans()
    {
        return $this->hasMany(EducationTempTrans::className(), ['address' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEducationTrans()
    {
        return $this->hasMany(EducationTrans::className(), ['address' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovetempleTrans()
    {
        return $this->hasMany(MovetempleTrans::className(), ['address' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonMasters()
    {
        return $this->hasMany(PersonMaster::className(), ['address' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonMasters0()
    {
        return $this->hasMany(PersonMaster::className(), ['family_address' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPositionTrans()
    {
        return $this->hasMany(PositionTrans::className(), ['address_id' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPromotionTrans()
    {
        return $this->hasMany(PromotionTrans::className(), ['temple_address' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaytempleTrans()
    {
        return $this->hasMany(StaytempleTrans::className(), ['staytemple_address' => 'address_id']);
    }
}
