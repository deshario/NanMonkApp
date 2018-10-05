<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "training".
 *
 * @property int $training_id
 * @property string $training_course หัวข้ออบรม
 * @property string $training_date วันที่อบรม
 * @property string $training_by จัดโดย
 *
 * @property MainTable[] $mainTables
 */
class Training extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'training';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['training_course', 'training_date', 'training_by'], 'required'],
            [['training_date'], 'safe'],
            [['training_course', 'training_by'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'training_id' => 'Training ID',
            'training_course' => 'หัวข้ออบรม',
            'training_date' => 'วันที่อบรม',
            'training_by' => 'จัดโดย',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMainTables()
    {
        return $this->hasMany(MainTable::className(), ['training_id' => 'training_id']);
    }
}
