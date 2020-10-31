<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DeviceFingerprint */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="device-fingerprint-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'device_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'consumed')->textInput() ?>

    <?= $form->field($model, 'i')->textInput() ?>

    <?= $form->field($model, 'cos_phi')->textInput() ?>

    <?= $form->field($model, 'noise_50')->textInput() ?>

    <?= $form->field($model, 'noise_100')->textInput() ?>

    <?= $form->field($model, 'noise_200')->textInput() ?>

    <?= $form->field($model, 'noise_400')->textInput() ?>

    <?= $form->field($model, 'noise_800')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
