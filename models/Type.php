<?php
namespace app\models;

use yii\base\Model;

class Type extends Model
{

    const DETAIL = 1;
    const UNIT = 2;

    public static $list = [
        self::DETAIL => 'Деталь',
        self::UNIT => 'Сборочная единица'
    ];


    public $id;
    public $name;

    public static function findOne($id)
    {
        $model = new static();
        $model->id = $id;
        $model->name = self::$list[$id];
        return $model;
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Тип',
        ];
    }




}