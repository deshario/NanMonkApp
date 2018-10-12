<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "specialwork_trans".
 *
 * @property int $id ลำดับผลงานทีสำคัญ
 * @property string $idperson หมายเลขบัตรประชาชน
 * @property int $idwork รหัสประเภทผลงานสำคัญ
 * @property string $description รายละเอียดเพิ่มเติม
 *
 * @property PersonMaster $person
 * @property Specialwork $work
 */
class SpecialworkTrans extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'specialwork_trans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idperson'], 'required'],
            [['idwork'], 'integer'],
            [['idperson'], 'string', 'max' => 13],
            [['description'], 'string', 'max' => 150],
            [['idperson'], 'exist', 'skipOnError' => true, 'targetClass' => PersonMaster::className(), 'targetAttribute' => ['idperson' => 'idperson']],
            [['idwork'], 'exist', 'skipOnError' => true, 'targetClass' => Specialwork::className(), 'targetAttribute' => ['idwork' => 'idwork']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ลำดับผลงานทีสำคัญ',
            'idperson' => 'หมายเลขบัตรประชาชน',
            'idwork' => 'รหัสประเภทผลงานสำคัญ',
            'description' => 'รายละเอียดเพิ่มเติม',
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
    public function getWork()
    {
        return $this->hasOne(Specialwork::className(), ['idwork' => 'idwork']);
    }
}
