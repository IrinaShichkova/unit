<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unit".
 *
 * @property integer $id
 * @property string $name
 * @property string $gost
 * @property string $article
 * @property integer $type_id
 *
 * @property ModelRef[] $modelRefs
 * @property Moving[] $movings
 * @property Relation[] $relations
 * @property Relation[] $relations0
 */
class Unit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'gost', 'article', 'type_id'], 'required'],
            [['type_id'], 'integer'],
            [['name', 'gost', 'article'], 'string', 'max' => 255],
            [['article'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'gost' => 'ГОСТ',
            'article' => 'Артикул',
            'type_id' => 'Тип',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModelRefs()
    {
        return $this->hasMany(ModelRef::className(), ['unit_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovings()
    {
        return $this->hasMany(Moving::className(), ['unit_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelations()
    {
        return $this->hasMany(Relation::className(), ['parent_unit_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelations0()
    {
        return $this->hasMany(Relation::className(), ['unit_id' => 'id']);
    }


    public function getType()
    {
        //return $this->hasOne(Type::className(), ['type_id' => 'id']);
        return Type::findOne($this->type_id);
    }
}
