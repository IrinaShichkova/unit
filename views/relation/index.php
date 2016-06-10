<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Unit;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RelationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Детали и сборочные единицы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relation-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить связь', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'label' => 'Деталь',
                'attribute' => 'unit_id',
                'value' => function($model) {return $model->unit->name;},
                'filter' => Html::activeDropDownList($searchModel, 'unit_id', ArrayHelper::map(Unit::find()->asArray()->all(), 'id', 'name'),['class'=>'form-control','prompt' => 'Выберите деталь']),
            ],
            [
                'label' => 'Сборочная единица',
                'attribute' => 'unit_id',
                'value' => function($model) {return $model->parent_unit->name;},
                'filter' => Html::activeDropDownList($searchModel, 'parent_unit_id', ArrayHelper::map(Unit::find()->asArray()->all(), 'id', 'name'),['class'=>'form-control','prompt' => 'Выберите сборочную единицу']),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
