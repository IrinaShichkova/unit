<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Unit;

/* @var $this yii\web\View */
/* @var $model app\models\Relation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="relation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'unit_id')->dropDownList([''=>'']+ArrayHelper::map(Unit::find()->orderBy('name')->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'parent_unit_id')->dropDownList([''=>'']+ArrayHelper::map(Unit::find()->orderBy('name')->all(), 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
