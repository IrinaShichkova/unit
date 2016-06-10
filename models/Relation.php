<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "relation".
 *
 * @property integer $id
 * @property integer $unit_id
 * @property integer $parent_unit_id
 *
 * @property Unit $parentUnit
 * @property Unit $unit
 */
class Relation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'relation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['unit_id', 'parent_unit_id'], 'required'],
            [['unit_id', 'parent_unit_id'], 'integer'],
            [['parent_unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['parent_unit_id' => 'id']],
            [['unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['unit_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'unit_id' => 'Деталь',
            'parent_unit_id' => 'Сборочная единица',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentUnit()
    {
        return $this->hasOne(Unit::className(), ['id' => 'parent_unit_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(Unit::className(), ['id' => 'unit_id']);
    }

    public function getParent_unit()
    {
        return $this->hasOne(Unit::className(), ['id' => 'parent_unit_id']);
    }
}
