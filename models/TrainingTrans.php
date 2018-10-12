<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "training_trans".
 *
 * @property int $id ลำดับสมณศักดิ์ที่ได้รับ
 * @property string $idperson หมายเลขบัตรประชาชน
 * @property int $training_id ชื่อหลักสูตรอบรม
 * @property string $trainingdate วันที่ได้รับการอบรม
 * @property string $trainingby จัดอบรมโดย
 * @property string $others ชื่อหลักสูตรอืนๆ
 * @property string $attachfile เส้นทางการจัดเก็บไฟล์แนบ
 *
 * @property Training $training
 * @property PersonMaster $person
 */
class TrainingTrans extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'training_trans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idperson'], 'required'],
            [['training_id'], 'integer'],
            [['trainingdate'], 'safe'],
            [['idperson'], 'string', 'max' => 13],
            [['trainingby', 'others'], 'string', 'max' => 100],
            [['attachfile'], 'string', 'max' => 255],
            [['training_id'], 'exist', 'skipOnError' => true, 'targetClass' => Training::className(), 'targetAttribute' => ['training_id' => 'idtraining']],
            [['idperson'], 'exist', 'skipOnError' => true, 'targetClass' => PersonMaster::className(), 'targetAttribute' => ['idperson' => 'idperson']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ลำดับสมณศักดิ์ที่ได้รับ',
            'idperson' => 'หมายเลขบัตรประชาชน',
            'training_id' => 'ชื่อหลักสูตรอบรม',
            'trainingdate' => 'วันที่ได้รับการอบรม',
            'trainingby' => 'จัดอบรมโดย',
            'others' => 'ชื่อหลักสูตรอืนๆ',
            'attachfile' => 'เส้นทางการจัดเก็บไฟล์แนบ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTraining()
    {
        return $this->hasOne(Training::className(), ['idtraining' => 'training_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(PersonMaster::className(), ['idperson' => 'idperson']);
    }
}
