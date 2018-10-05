<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $address_id
 * @property string $home_no บ้านเลขที่
 * @property string $tambol ตำบล
 * @property string $amphur อำเภอ
 * @property string $province จังหวัด
 * @property string $zipcode รหัสไปรษณีย์
 *
 * @property Rank[] $ranks
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
            [['home_no', 'tambol', 'amphur', 'province'], 'required'],
            [['home_no'], 'string', 'max' => 10],
            [['tambol', 'amphur', 'province', 'zipcode'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'address_id' => 'Address ID',
            'home_no' => 'Home No',
            'tambol' => 'Tambol',
            'amphur' => 'Amphur',
            'province' => 'Province',
            'zipcode' => 'Zipcode',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRanks()
    {
        return $this->hasMany(Rank::className(), ['rank_temple_address' => 'address_id']);
    }
}
