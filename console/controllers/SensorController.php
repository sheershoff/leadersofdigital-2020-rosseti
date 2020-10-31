<?php


namespace console\controllers;


use common\models\Sensor;
use common\models\SensorData;

class SensorController extends \yii\console\Controller
{
    public function actionResetAndImport()
    {
        $sqlfpath = '/var/www/html/sensor-data/reset.sql';
        if(file_exists($sqlfpath)) {
            $sql = file_get_contents($sqlfpath);
            if (! preg_match_all("/('(\\\\.|.)*?'|[^;])+/s", $sql, $m))
                return;

            foreach ($m[0] as $sql) {
                if (strlen(trim($sql)))
                    \Yii::$app->db->createCommand($sql)->execute();
            }
            unset($sql);
        }
        \Yii::$app->db->createCommand('TRUNCATE TABLE sensor_data;')->execute();
        foreach (range(1, 10) as $i) {
            $fpath = '/var/www/html/sensor-data/track-' . $i . '.csv';
            if(!file_exists($fpath)) continue;
            $sensor = Sensor::findOne($i);
            if(!$sensor) continue;
            $handle = fopen($fpath, "r");
            while (($fileop = fgetcsv($handle, 1000, ",")) !== false)
            {
                //ts, 0
                //noise_50, 1
                //noise_100, 2
                //noise_200, 3
                //noise_400, 4
                //noise_800, 5
                //i, 6
                //cos_phi, 7
                //consumed 8

                $sd = new SensorData();
                $sd->sensor_id = $sensor->id;
                $sd->tstamp = $fileop[0];
                $sd->noise_50 = $fileop[1];
                $sd->noise_100 = $fileop[2];
                $sd->noise_200 = $fileop[3];
                $sd->noise_400 = $fileop[4];
                $sd->noise_800 = $fileop[5];
                $sd->i = $fileop[6];
                $sd->cos_phi = $fileop[7];
                $sd->consumed = $fileop[8];

                $sd->save();
            }
        }
    }
}