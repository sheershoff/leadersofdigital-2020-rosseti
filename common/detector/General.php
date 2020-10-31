<?php


namespace common\detector;


use common\models\DeviceData;
use common\models\Sensor;
use common\models\SensorData;

class General
{

    private static $debug = false;

    private static function debuglog($s)
    {
        if (self::$debug) {
            echo $s . "\n";
        }
    }

    public static function disaggregate()
    {
        $sensors = Sensor::find()->createCommand()->query();
        while ($sensor = $sensors->read()) {
            self::debuglog("Sensor {$sensor['id']}");
            // find last parsed
            // @TODO - можно помечать в бд или отдельно хранить до какого спарсили с какого датчика чтобы не бегать сто раз по нулевым включениям
            $last_parsed_ts = DeviceData::find()
                ->andWhere(['sensor_id' => $sensor['id']])
                ->orderBy(['tstamp' => SORT_DESC])
                ->limit(1)
                ->one();

            if ($last_parsed_ts) {
                $last_parsed_ts = $last_parsed_ts->tstamp;
            } else {
                $last_parsed_ts = -1;
            }

            self::debuglog("Since " . $last_parsed_ts);

            // find all unparsed data
            $sds = SensorData::find()
                ->andWhere(['sensor_id' => $sensor['id']])
                ->andWhere(['>', 'tstamp', $last_parsed_ts])
                ->createCommand();

            self::debuglog($sds->getRawSql());

            $sds = $sds->query();

            // parse'm
            while ($sd = $sds->read()) {
                $detect = Neural::detect([
                    $sd['noise_50'],
                    $sd['noise_100'],
                    $sd['noise_200'],
                    $sd['noise_400'],
                    $sd['noise_800'],
                    $sd['i']
                ]);


                // @TODO
                // хех. решили задачу когда что включено. осталось выковырять среднее потребление когда оно одно включено
                // и это надо как-то хранить - теоретически в фингерпринте должно болтаться сколько оно потребляет в режиме
                // с таким АЧХ - и тут понятно сразу стало зачем именно им вторая девайса для замеров образцов потребления.
                // ну или можно выколупывать когда только одно устройство включено минус шум/фон потребления.
                // но эту задачку мы не решим прям в процессе хакатона, но кажется что она решаема в принципе.

                // может как-то можно импеданс ещё задействовать - но нужен R&D уже с реальными данными с датчиков
                // а так - среднее потребление устройства надо писать в фингерпринт

                // а пока заглушка - усредняем потребление в моменте на все включенные устройства.
                $consumers_count = 0;
                foreach ($detect as $k => $v) {
                    if ($v > 0.95) {
                        $consumers_count++;
                    }
                }

                foreach ($detect as $k => $v) {
                    self::debuglog($v);
                    if ($v > 0.95) {
                        // device with id $k+1 is on
                        $dd = new DeviceData();
                        $dd->device_id = $k + 1;
                        $dd->tstamp = $sd['tstamp'];
                        $dd->sensor_id = $sd['sensor_id'];
                        $dd->consumed = $sd['consumed'] / $consumers_count; // @TODO см. выше где считается $consumers_count
                        $dd->save();
                    }
                }
            }

        }
    }
}