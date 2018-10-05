<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "portfolio".
 *
 * @property int $portfolio_id
 * @property string $portfolio_name ผลงานที่สำคัญ
 *
 * @property MainTable[] $mainTables
 */
class Portfolio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'portfolio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['portfolio_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'portfolio_id' => 'Portfolio ID',
            'portfolio_name' => 'ผลงานที่สำคัญ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMainTables()
    {
        return $this->hasMany(MainTable::className(), ['portfolio_id' => 'portfolio_id']);
    }
}
