<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "moving".
 *
 * @property integer $id
 * @property integer $unit_id
 * @property integer $plus
 * @property integer $minus
 * @property integer $amount
 * @property integer $time
 *
 * @property Unit $unit
 */
class Moving extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'moving';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['unit_id', 'minus', 'amount'], 'required'],
            [['unit_id', 'plus', 'minus', 'amount', 'time'], 'integer'],
            [['unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['unit_id' => 'id']],
            [['timeStr'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'unit_id' => 'ДСЕ',
            'plus' => 'Приход',
            'minus' => 'Расход',
            'amount' => 'Остаток',
            'time' => 'Дата',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(Unit::className(), ['id' => 'unit_id']);
    }
    
    
    public function save($runValidation = true, $attributeNames = null)
    {
        if($last = self::find()->where(['unitg_id' => $this->unit_id])->orderBy('id DESC')->limit(1)->one()) {
    	    $this->amount = $last->amount + $this->plus - $this->minus;
        }
	return parent::save($runValidation, $attributeNames);
    }



    public function getTimeStr {
        return null === $this->time ? '' : date('d.m.Y', $this->time);
    }

    public function setTimeStr($value)
    {
        $this->time = \DateTime::createFromFormat('d.m.Y', $value);
    }
	

    
    
}
