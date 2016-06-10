<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Unit;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Moving */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="moving-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'unit_id')->dropDownList([''=>'']+ArrayHelper::map(Unit::find()->orderBy('name')->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'plus')->textInput() ?>

    <?= $form->field($model, 'minus')->textInput() ?>

    <?//= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'timeStr')->widget(DatePicker::className(), [
        'language' => 'ru'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
