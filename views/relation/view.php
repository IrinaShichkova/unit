<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Relation */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Детали и сборочные единицы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            [
                'label' => 'Деталь',
                'attribute' => 'unit.name'
            ],
            [
                'label' => 'Сборочная единица',
                'attribute' => 'parent_unit.name'
            ],
        ],
    ]) ?>

</div>
