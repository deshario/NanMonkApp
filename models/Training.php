<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "training".
 *
 * @property int $idtraining
 * @property string $trainingname ชื่อหลักสูตรอบรม
 *
 * @property TrainingTrans[] $trainingTrans
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
            [['trainingname'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idtraining' => 'Idtraining',
            'trainingname' => 'ชื่อหลักสูตรอบรม',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrainingTrans()
    {
        return $this->hasMany(TrainingTrans::className(), ['training_id' => 'idtraining']);
    }
}
