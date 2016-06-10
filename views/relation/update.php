<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Relation */

$this->title = 'Изменить связь: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Детали и сборочные единицы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="relation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
