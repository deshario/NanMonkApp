<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "samanasak_level".
 *
 * @property int $samanasak_level_id
 * @property string $samanasak_level_name ชื่อลำดับสมณศักดิ์
 *
 * @property Samanasak[] $samanasaks
 */
class SamanasakLevel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'samanasak_level';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['samanasak_level_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'samanasak_level_id' => 'Samanasak Level ID',
            'samanasak_level_name' => 'ชื่อลำดับสมณศักดิ์',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSamanasaks()
    {
        return $this->hasMany(Samanasak::className(), ['samanasak_level' => 'samanasak_level_id']);
    }
}
