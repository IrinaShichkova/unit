<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Moving */

$this->title = 'Добавить операцию';
$this->params['breadcrumbs'][] = ['label' => 'Приход-расход', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="moving-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
