<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UnitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Units';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Unit', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'gost',
            'article',
            'type_id',
            [
                'label' => 'Запчасти',
                'format' => 'raw',
                'value' => function($model) { return Html::a('Запчасти', ['/detal', 'id' => $model->id]); },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>