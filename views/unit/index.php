<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Type;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UnitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ДСЕ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить ДСЕ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'gost',
            'article',
            [
                'label' => 'Тип',
                'attribute' => 'type.name',
                'value' => function($model) {return $model->type->name;},
                'filter' => Html::activeDropDownList($searchModel, 'type_id', Type::$list,['class'=>'form-control','prompt' => 'Выберите тип']),
            ],
            [
                'label' => 'Связь деталей и СЕ',
                'format' => 'raw',
                'value' => function($model) { return Html::a('Связи', ['/relation?RelationSearch[unit_id]=&RelationSearch[parent_unit_id]=' . $model->id]); },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
