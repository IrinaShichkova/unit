<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "model".
 *
 * @property integer $id
 * @property string $name
 *
 * @property ModelRef[] $modelRefs
 */
class Model extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'model';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Модель машины',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModelRefs()
    {
        return $this->hasMany(ModelRef::className(), ['model_id' => 'id']);
    }
}
