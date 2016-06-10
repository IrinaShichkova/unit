<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Model;
use app\models\Unit;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ModelRefSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Связи моделей машин и ДСЕ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="model-ref-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить новую связь', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'label' => 'Модель машины',
                'attribute' => 'model_id',
                'value' => function($model) {return $model->model->name;},
                'filter' => Html::activeDropDownList($searchModel, 'model_id', ArrayHelper::map(Model::find()->asArray()->all(), 'id', 'name'),['class'=>'form-control','prompt' => 'Выберите модель']),
            ],
            [
                'label' => 'ДСЕ',
                'attribute' => 'unit_id',
                'value' => function($model) {return $model->unit->name;},
                'filter' => Html::activeDropDownList($searchModel, 'unit_id', ArrayHelper::map(Unit::find()->asArray()->all(), 'id', 'name'),['class'=>'form-control','prompt' => 'Выберите ДСЕ']),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
