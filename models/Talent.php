<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "talent".
 *
 * @property int $talent_id
 * @property string $talent_name ความสามารถ
 *
 * @property MainTable[] $mainTables
 */
class Talent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'talent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['talent_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'talent_id' => 'Talent ID',
            'talent_name' => 'ความสามารถ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMainTables()
    {
        return $this->hasMany(MainTable::className(), ['talent_id' => 'talent_id']);
    }
}
