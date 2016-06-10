<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ModelRef */

$this->title = 'Добавить связь машин и ДСЕ';
$this->params['breadcrumbs'][] = ['label' => 'Связи моделей машин и ДСЕ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="model-ref-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
