<?php


namespace console\controllers;


use common\detector\General;

class DetectorController extends \yii\console\Controller
{
    /**
     * Runs detection
     */
    public function actionIndex()
    {
        General::disaggregate();
    }
}