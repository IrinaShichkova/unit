<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Relation */

$this->title = 'Добавить связь';
$this->params['breadcrumbs'][] = ['label' => 'Детали и сборочные единицы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
