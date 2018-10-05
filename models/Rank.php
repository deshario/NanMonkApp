<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rank".
 *
 * @property int $rank_id
 * @property int $rank_position ระดับตำแหน่ง
 * @property string $rank_given_temple วัด
 * @property string $rank_given_date แต่งตั้งเมื่อ
 * @property int $rank_temple_address ที่อยู่
 * @property int $rank_type ชนิดของตำแหน่ง
 * @property string $rank_file ไฟล์แนบ
 *
 * @property MainTable[] $mainTables
 * @property Address $rankTempleAddress
 * @property Position $rankPosition
 */
class Rank extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rank';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rank_position', 'rank_given_temple', 'rank_given_date', 'rank_temple_address', 'rank_type'], 'required'],
            [['rank_position', 'rank_temple_address', 'rank_type'], 'integer'],
            [['rank_given_date'], 'safe'],
            [['rank_given_temple'], 'string', 'max' => 45],
            [['rank_file'], 'string', 'max' => 100],
            [['rank_temple_address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['rank_temple_address' => 'address_id']],
            [['rank_position'], 'exist', 'skipOnError' => true, 'targetClass' => Position::className(), 'targetAttribute' => ['rank_position' => 'position_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rank_id' => 'Rank ID',
            'rank_position' => 'ระดับตำแหน่ง',
            'rank_given_temple' => 'วัด',
            'rank_given_date' => 'แต่งตั้งเมื่อ',
            'rank_temple_address' => 'ที่อยู่',
            'rank_type' => 'ชนิดของตำแหน่ง',
            'rank_file' => 'ไฟล์แนบ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMainTables()
    {
        return $this->hasMany(MainTable::className(), ['rank_id' => 'rank_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRankTempleAddress()
    {
        return $this->hasOne(Address::className(), ['address_id' => 'rank_temple_address']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRankPosition()
    {
        return $this->hasOne(Position::className(), ['position_id' => 'rank_position']);
    }
}
