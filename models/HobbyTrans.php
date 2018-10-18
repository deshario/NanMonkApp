<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hobby_trans".
 *
 * @property int $id ลำดับความสามารถพิเศษ
 * @property string $idperson หมายเลขบัตรประชาชน
 * @property int $idhobby รหัสประเภทความสามารถพิเศษ
 * @property string $others ความสามารถพิเศษ
 *
 * @property Hobby $hobby
 * @property PersonMaster $person
 */
class HobbyTrans extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hobbie_trans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idperson'], 'required'],
            [['idhobby'], 'integer'],
            [['idperson'], 'string', 'max' => 13],
            [['others'], 'string', 'max' => 100],
            [['idhobby'], 'exist', 'skipOnError' => true, 'targetClass' => Hobby::className(), 'targetAttribute' => ['idhobby' => 'idhobby']],
            [['idperson'], 'exist', 'skipOnError' => true, 'targetClass' => PersonMaster::className(), 'targetAttribute' => ['idperson' => 'idperson']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ลำดับความสามารถพิเศษ',
            'idperson' => 'หมายเลขบัตรประชาชน',
            'idhobby' => 'รหัสประเภทความสามารถพิเศษ',
            'others' => 'ความสามารถพิเศษ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHobby()
    {
        return $this->hasOne(Hobby::className(), ['idhobby' => 'idhobby']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(PersonMaster::className(), ['idperson' => 'idperson']);
    }
}
