<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DeviceFingerprintSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="device-fingerprint-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'device_id') ?>

    <?= $form->field($model, 'consumed') ?>

    <?= $form->field($model, 'i') ?>

    <?= $form->field($model, 'cos_phi') ?>

    <?php // echo $form->field($model, 'noise_50') ?>

    <?php // echo $form->field($model, 'noise_100') ?>

    <?php // echo $form->field($model, 'noise_200') ?>

    <?php // echo $form->field($model, 'noise_400') ?>

    <?php // echo $form->field($model, 'noise_800') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
