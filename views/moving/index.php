<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Unit;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MovingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Приход-расход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="moving-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить операцию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'label' => 'ДСЕ',
                'attribute' => 'unit_id',
                'value' => function($model) {return $model->unit->name;},
                'filter' => Html::activeDropDownList($searchModel, 'unit_id', ArrayHelper::map(Unit::find()->asArray()->all(), 'id', 'name'),['class'=>'form-control','prompt' => 'Выберите ДСЕ']),
            ],
            'plus',
            'minus',
            'amount',
            [
                'attribute' => 'time',
                'label'=> 'Дата',
                'value' => 'timeStr'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
