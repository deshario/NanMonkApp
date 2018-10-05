<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "samanasak".
 *
 * @property int $samanasak_id
 * @property int $samanasak_level ลำดับสมณศักดิ์
 * @property string $rachathinanam ราชทินนาม
 * @property string $samanasak_date ได้รับเมือวันที่
 *
 * @property MainTable[] $mainTables
 * @property SamanasakLevel $samanasakLevel
 */
class Samanasak extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'samanasak';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['samanasak_level', 'rachathinanam', 'samanasak_date'], 'required'],
            [['samanasak_level'], 'integer'],
            [['samanasak_date'], 'safe'],
            [['rachathinanam'], 'string', 'max' => 45],
            [['samanasak_level'], 'exist', 'skipOnError' => true, 'targetClass' => SamanasakLevel::className(), 'targetAttribute' => ['samanasak_level' => 'samanasak_level_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'samanasak_id' => 'Samanasak ID',
            'samanasak_level' => 'ลำดับสมณศักดิ์',
            'rachathinanam' => 'ราชทินนาม',
            'samanasak_date' => 'ได้รับเมือวันที่',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMainTables()
    {
        return $this->hasMany(MainTable::className(), ['samanasak_id' => 'samanasak_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSamanasakLevel()
    {
        return $this->hasOne(SamanasakLevel::className(), ['samanasak_level_id' => 'samanasak_level']);
    }
}
