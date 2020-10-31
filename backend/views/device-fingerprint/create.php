<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DeviceFingerprint */

$this->title = Yii::t('app', 'Create Device Fingerprint');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Device Fingerprints'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="device-fingerprint-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
